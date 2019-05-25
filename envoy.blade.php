@servers(['web' => 'yannick@92.39.246.126 -p 22'])

<?php
$repo = 'https://github.com/yanndeo/PlccZone';
$release_dir = '/var/www/vhosts/plccnczone.com/package_nw/releases';
$shared = '/var/www/vhosts/plccnczone.com/package_nw/shared';

$app_dir = '/var/www/vhosts/plccnczone.com/';
$current= '/var/www/vhosts/plccnczone.com/httpdocs';

$release = 'release_' . date('YmdHis');
$limiteless = 3;

?>

@macro('deploy', ['on' => 'web'])
    fetch_repo
    clean_old_releases
    run_composer
    update_symlinks
    update_permissions
    migrate
    up
@endmacro

@task('prepare')
mkdir -p {{ $shared }};

@endtask

@task('fetch_repo')
    [ -d {{ $release_dir }} ] || mkdir {{ $release_dir }};
    cd {{ $release_dir }};
    git clone {{ $repo }} {{ $release }};

    echo "fin clone repo dans {{ $release }}";
@endtask

@task('clean_old_releases')
    cd {{ $release_dir }};
    echo "suppr. des vieilles releases";
    #chmod -R 777 {{ $shared }}/storage
    #chgrp -R www-data storage bootstrap/cache
    #chmod -R ug+rwx storage bootstrap/cache
    #chmod 777 /storage/logs/laravel.log
    ls {{ $release_dir }} | sort -r |tail -n +{{ $limiteless + 1 }} | xargs -r -I{} rm -rf {} ;
    echo 'Updating file permissions storage';
@endtask

@task('run_composer')
    cd {{ $app_dir }};
    mkdir -p {{ $shared }}/vendor;
    ln -nfs {{ $shared }}/vendor {{ $release_dir }}/{{ $release }}/vendor;
    cd {{ $release_dir }}/{{ $release }};
    /opt/plesk/php/7.1/bin/php /usr/lib64/plesk-9.0/composer.phar install --prefer-dist --no-scripts;
    /opt/plesk/php/7.1/bin/php /usr/lib64/plesk-9.0/composer.phar install ;
    /opt/plesk/php/7.1/bin/php /usr/lib64/plesk-9.0/composer.phar dumpautoload -o;
    /opt/plesk/php/7.1/bin/php artisan clear-compiled --env=production;
    echo "fin composer optimized";

@endtask


@task('update_symlinks')

   # Remove the storage directory and replace with persistent data
    rm -rf {{ $release_dir }}/{{ $release }}/storage;
    cd {{ $release_dir }}/{{ $release }};
    ln -nfs {{ $shared }}/storage storage;
    echo 'Linking storage directory';


    # Import the environment config
    echo 'Linking .env file';
    cd {{ $release_dir }}/{{ $release }};
    mv .env.example .env
    echo 'rename file .env.example to .env: ok'
    #ln -nfs {{ $shared }}/.env .env;
    echo 'linking files: ok';


   # Symlink the latest release to the current directory
    #cd {{ $app_dir }}
    #chown -R yannick:psacln httpdocs/
    #chmod -R 777 httpdocs
    rm -rf {{ $current }}'/'* ;
    echo " {{$current}} vider ";
    ln -s {{ $release_dir }}/{{ $release }} {{ $current }};

    #chgrp -h www-data {{ $current}};
    echo "liens symb . recreer :env ,storage";

@endtask


@task('update_permissions')
    cd {{ $release_dir }};
    chgrp -R psacln {{ $release }};
    chmod -R ug+rwx {{ $release }};

    #cd {{ $release }};
    #mv .env.prod .env;

    cd {{ $release_dir }}/{{ $release }};
    echo 'Updating directory permissions';
    find . -type d -exec chmod 775 {} \;
    echo 'Updating file permissions';
    find . -type f -exec chmod 664 {} \;

    echo "maj permision";

@endtask

@task('migrate')
    cd {{ $release_dir }}/{{ $release }};

    /opt/plesk/php/7.1/bin/php artisan cache:clear;
    /opt/plesk/php/7.1/bin/php artisan migrate --env=production --force;
    #php artisan db:seed;

    /opt/plesk/php/7.1/bin/php artisan config:clear;
    /opt/plesk/php/7.1/bin/php artisan route:clear;
    /opt/plesk/php/7.1/bin/php artisan config:cache;
    /opt/plesk/php/7.1/bin/php artisan storage:link;

    /opt/plesk/php/7.1/bin/php artisan down;
    echo 'Run migrations';

@endtask

@task('up')
    cd {{ $current }};
    npm install
    npm run build
    npm cache clear --force
    /opt/plesk/php/7.1/bin/php artisan up;
    echo " finished";
@endtask



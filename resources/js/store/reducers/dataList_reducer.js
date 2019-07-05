import {
    INIT_DATALIST,
    BRAND_SELECTED,
    CATEGORY_SELECTED,
    FAILURES_DATA
} from "../../actions";


let initialState = {
    initDataArticleList: [],
    currentDataArticleList: [],
    currentBrand: {},
    currentCategory:{},
    error: null,
    isLoading: true
};


 function filterDataArticleList(state = initialState , action){
    let nextState
    
    //console.log('State_Globale1::',state);

    switch (action.type) {

        case INIT_DATALIST:

           return nextState = {
               ...state,
               initDataArticleList: action.value,
               currentDataArticleList: action.value,
               isLoading: false
           };
           
        case BRAND_SELECTED:
            return nextState = {
                ...state,
                currentDataArticleList: state.initDataArticleList.filter(item => item.brand_id === action.value.id),
                currentBrand: getDataBrandAfterFilter(action.value),
                isLoading: false,

            }; 

        case CATEGORY_SELECTED:
            return nextState = {
                ...state,
                currentDataArticleList: state.initDataArticleList.filter(item => item.category_id === action.value.id),
                currentCategory: getDataCategoryAfterFilter(action.value) ,
                isLoading: false,

            };

        case FAILURES_DATA:
            return nextState = {
                ...state,
                error: action.value,
                isLoading: false,
            };   

        default:
            return state;


    }

    // Modification du state en fonction de l'action ici



}

export default filterDataArticleList



/**
 * Filter what we want
 * category
 */
function getDataCategoryAfterFilter(data) {
    return {
        id: data.id,
        title: data.title,
        description: data.description,
        articles_count: data.products_list,
        avatar: data.avatar,
        created_at: data.created_at
    };
}



/**
 * Filter what we want
 * brand
 */
function getDataBrandAfterFilter(data) {
    return {
        id: data.id,
        name: data.name,
        comment: data.comment,
        avatar: data.avatar,
        created_at: data.created_at
    };
}




/**
 * 1-on construit une fonction 
 * qui retourne un objet
 * qui va être un bout du state de l'application
 * 
 */

 /**
  * 2-Un reducer est donc une fonction qui
  *  modifie le state de votre application 
  *  en fonction d'une action.
  */

  /**
   * 3-le state doit toujours rester immuable.
   * Si vous souhaitez modifier un objet immuable, 
   * il faut créer une copie de cet objet (donc créer un nouvel objet) 
   * et y appliquer vos modifications.
   * 
   */
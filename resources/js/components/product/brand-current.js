import React from 'react'

const BrandCurrent = ({brand}) => {
console.log('currentBrand', brand)

    return (
        <div>
            <h4> {brand.name} </h4>
            <p> {brand.comment}. </p>
        </div>
    );
}

export default BrandCurrent
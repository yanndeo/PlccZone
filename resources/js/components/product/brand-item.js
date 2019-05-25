import React from 'react';



const BrandItem = (props) => {

let { brand} = props;


    return (
        <li className="main-nav-list" 
            onClick={() => receiveCallbackToSendBrand(brand)} >
            <a
                data-toggle="collapse"
                href="#homeAppliance"
                aria-expanded="false"
                aria-controls="homeAppliance"
            >
                <span className="lnr lnr-arrow-right" /> {brand.name}
                <span className="number">({brand.count_pb})</span>
            </a>
        </li>
        
        
    );


    function receiveCallbackToSendBrand(brand)
    {
        props.selectedBrandCallback(brand);
    }
};




export default BrandItem;
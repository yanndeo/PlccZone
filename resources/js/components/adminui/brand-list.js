import React from 'react';
import PropTypes from 'prop-types';
import { connect } from "react-redux";
import { _SELECTED_BRAND } from '../../actions/index';


const BrandList = ({ brands, _SELECTED_BRAND}) => {



    /**
     * Send action 
     * when we clicked
     */
    const handleClick = (e, ID) => {
        e.preventDefault();
        _SELECTED_BRAND(ID)
    }

    /**
     * render list 
     */
    const renderList = brands.slice(0,11).map(brand => (
        <li className="list-group-item d-flex px-3" key={brand.id} onClick={(e) => handleClick(e, brand.id)}>
            <span className="text-semibold text-fiord-blue"> <a href="#" style={{ color: '#3d5170' }}>  {brand.name} </a> </span>
            <span className="ml-auto text-right text-semibold text-reagent-gray">{brand.count_pb}</span>
        </li>
    ));





    return (
        <div className="card card-small">
            <div className="card-header border-bottom">
                <h6 className="m-0"> FOURNISSEURS</h6>
            </div>
            <div className="card-body p-0">
                <ul className="list-group list-group-small list-group-flush">

                    {renderList}
                    

                    <div className="card-footer border-top">
                        <div className="row">

                            <div className="col text-right view-report">
                                <a href="#">Full report &rarr;</a>
                            </div>
                        </div>
                    </div>
                </ul>

            </div>

        </div>
    );
};


/**
 * PropTypes
 */
BrandList.propTypes = {
    brands: PropTypes.array.isRequired ,
};

/**
 * List from store
 */
const mapStateToProps = state => ({
    brands: state.listeBrandANDCategory.brand_list
});

export default connect(mapStateToProps, {_SELECTED_BRAND })(BrandList);

import React from "react";
import PropTypes from "prop-types";
import { connect } from 'react-redux';
import { _SELECTED_CATEGORY } from "../../actions/index";



const CategoryList = ({ categories, _SELECTED_CATEGORY }) => {



    /**
     * Send action when i clicked 
     * to show details on form
     */
    const handleClick= (e,ID)=>{
        e.preventDefault();
        _SELECTED_CATEGORY(ID)
    }




    /**
     * render list 
     */
    const renderList = categories.slice(0, 7).map(category => (
        <li className="list-group-item d-flex px-3" key={category.id} onClick={(e)=> handleClick(e,category.id) }  >
            <span className="text-semibold text-fiord-blue"  > <a href="#" style={{ color: '#3d5170' }}>{category.title}</a></span>
            <span className="ml-auto text-right text-semibold text-reagent-gray">{category.count_pb}</span>
        </li>
    ));



    return (
        <div className="card card-small">
            <div className="card-header border-bottom">
                <h6 className="m-0">CATEGORIES </h6>
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
CategoryList.propTypes = {
    categories: PropTypes.array.isRequired,
    _SELECTED_CATEGORY : PropTypes.func.isRequired,
};

/**
 * List from store 
 */
const mapStateToProps = state => ({
    categories: state.listeBrandANDCategory.caegory_list,
    
});

export default connect(mapStateToProps, { _SELECTED_CATEGORY })(CategoryList);
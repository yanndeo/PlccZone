import React, { Component } from 'react'
import CategoryItem from './category-item';
import { _SELECTED_CATEGORY } from '../../actions/index';
import { connect } from "react-redux";

class CategoriesList extends Component {





    // function make a category list map
    renderCategoryList() {

        return (this.props.categories.map((category, i) => {
            return (
                <CategoryItem
                    key={category.id}
                    category={category}
                    selectedCategoryCallback={() => this.props.dispatch(_SELECTED_CATEGORY(category))}
                />
            );
        })
        )
    }

    render () {
        console.log('CATEGORIES__:', this.props.categories)
        return (

            <div className="sidebar-filter mt-50"> 
                <div className="top-filter-head">Categories</div>
                <div className="common-filter">
                    <div className="head"></div>
                        <ul>
                            {this.renderCategoryList()}                     
                        </ul>
                </div>


            </div>
        )
    }
}

export default connect()(CategoriesList);
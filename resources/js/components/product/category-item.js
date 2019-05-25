import React from 'react'

const CategoryItem = props => {
    let { category } = props;

    return (
        
        <li className="filter-list">

            <input
                className="pixel-radio"
                type="radio"
                id={category.id}
                name={category.slug}
                onClick={() => receiveCallbackToSendCategory(category)}
            />

            <label htmlFor={category.id}>
                {category.title} <span>( {category.count_pb} )</span>
            </label>
        </li>
    );




    function receiveCallbackToSendCategory(category) {
        props.selectedCategoryCallback(category);
    }
};

export default CategoryItem
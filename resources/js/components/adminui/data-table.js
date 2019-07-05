import React from 'react';
import PropTypes from "prop-types";
import { connect } from "react-redux";
import Loader from "../utils/loader";






const DataTable = ({ articles }) => {

console.log('articles-list-admin',articles)


const renderList = articles.slice(0,11).map((article, i) =>(

    <tr key={article.id}>
        <td>{i}</td>
        <td>{article.reference}</td>
        <td>XX</td>
        <td>{article.name}</td>
        <td> {article.category_title} </td>
        <td> {article.brand_name} </td>
    </tr>
))

    return (
        <div className="card card-small">
            <div className="card-header border-bottom">
                <h6 className="m-0">Articles </h6>
            </div>
            <div className="card-body pt-0">
                <table className="table mb-0">
                    <thead className="bg-light">
                        <tr>
                            <th scope="col" className="border-0">#</th>
                            <th scope="col" className="border-0">Ref</th>
                            <th scope="col" className="border-0">Qte</th>
                            <th scope="col" className="border-0">Designation</th>
                            <th scope="col" className="border-0">Categorie</th>
                            <th scope="col" className="border-0">Fournisseur</th>
                        </tr>
                    </thead>
                    <tbody>

                        { renderList }

                    </tbody>
                </table>
            </div>


            <div className="card-footer border-top">
                <div className="row">

                    <div className="col text-right view-report">
                        <a href="#">Full report &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    )
}

DataTable.propTypes = {
    articles : PropTypes.array.isRequired,
}


const mapStateToProps = state => ({
    articles: state.filterDataArticleList.initDataArticleList
});

export default connect(mapStateToProps, {})(DataTable)
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import {API_END_POINT} from "../utils/uri";
//Components
import DataTable from "./data-table";
import BrandList from './brands-list';
import CategoriesList from "./categories-list";
import BrandCurrent from "./brand-current";
import Loader from "../utils/loader";
import {connect} from 'react-redux'

//actions
import { _DATA_ARTICLES_INITIAL, _FAILURES_DATA_ARTICLES, _BRANDS , _CATEGORIES } from "../../actions/index";


 class App extends Component {

    constructor (props) {
        super(props)
   }


     componentDidMount(){
        axios.get(`${API_END_POINT}products`)
             .then(Response => {
                console.log('all-data',Response.data);
                //action redux
                 this.props.dispatch(_DATA_ARTICLES_INITIAL(Response.data.products)); // type and value define in index.js action datalistInitial
                 this.props.dispatch(_BRANDS(Response.data.brands)); 
                 this.props.dispatch(_CATEGORIES(Response.data.categories));
            })
            .catch((error)=>{
                console.log(error);
                this.props.dispatch(_FAILURES_DATA_ARTICLES(error));
            });
    }





    render() {
        const { error, isLoading, articles, brands, categories, currentBrand  } = this.props;

        console.log("from_store", currentBrand);
        
        return (
            <div className="row">
                <div className="col-xl-3 col-lg-4 col-md-5">
                    <BrandList brands={brands} />
                    <CategoriesList categories={categories} />
                </div>

                <div className="col-xl-9 col-lg-8 col-md-7">
                        <BrandCurrent brand={currentBrand} />
                        {isLoading ? <Loader /> : <DataTable articles={articles} /> }
                </div>
            </div>
        );
    }
}


//connexion du state globlale(une patie ) aux props du component
const mapStateToProps =(state) =>{
    console.log("mapStateToProps", state);

    return {
        articles: state.filterDataArticleList.currentDataArticleList,
        isLoading: state.filterDataArticleList.isLoading,
        error: state.filterDataArticleList.error,
        currentBrand: state.filterDataArticleList.currentBrand,
        brands: state.listeBrandANDCategory.brand_list,
        categories: state.listeBrandANDCategory.caegory_list
    };
}
export default connect(mapStateToProps)(App);

import React, { Component, Fragment } from "react";
import ReactDOM from "react-dom";
// Import des Libs
import { createStore, applyMiddleware } from "redux";
import thunk from "redux-thunk";
import { Provider } from "react-redux";
import STORE from '../../store/configureStore';
import DataTable from "./data-table";
import BrandList from './brand-list';
import CategoryForm from "./category-form";
import BrandForm from './brand-form';
import CategoryList from './category-list';
import { _GETALLDATALIST } from "../../actions";
import AlertMessage from '../utils/alertMessage';


 class Index extends Component {


    /**
     * After mounting
     */
     componentDidMount(){
         STORE.dispatch(_GETALLDATALIST())

     }


    render() {
        return (
            <Fragment>

                <AlertMessage/>

                <div className="col-lg-9 col-md-12 col-sm-12 mb-4">
                    <DataTable />
                </div>
                <div className="col-lg-3 col-md-12 col-sm-12 mb-4">
                    <BrandList />
                </div>
                <div className="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <CategoryForm />
                </div>
                <div className="col-lg-5 col-md-6 col-sm-12 mb-4">
                    <BrandForm />
                </div>
                <div className="col-lg-3 col-md-12 col-sm-12 mb-4 ">
                    <CategoryList />
                </div>
            </Fragment>
        );
    }
}

if (document.getElementById("main-admin-ui")){
    console.log("STORE:", STORE.getState().filterDataArticleList.isLoading);

    ReactDOM.render(
        <Provider store={STORE}>
            <Index />
        </Provider>,
        document.getElementById("main-admin-ui")
    );
}

export default Index
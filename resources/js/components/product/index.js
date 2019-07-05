import React from 'react';
import ReactDOM from "react-dom";
// Import des Libs
import { createStore, applyMiddleware } from "redux";
import thunk from "redux-thunk";
import { Provider } from "react-redux";
import STORE from '../../store/configureStore';
import App from './App';


 const Index = () => {
    return (
        <App/>
    );
};

if (document.getElementById("table")) {
    ReactDOM.render(
        <Provider store={STORE}>
            <Index />
        </Provider>,
        document.getElementById("table")
    );
}
export default Index
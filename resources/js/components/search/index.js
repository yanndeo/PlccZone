import React from 'react';
import ReactDOM from "react-dom";
// Import des Libs

// Import des Libs
import { createStore, applyMiddleware } from "redux";
import thunk from "redux-thunk";
import { Provider } from "react-redux";
import STORE from '../../store/configureStore';
import App from './App';

const Index = () => {
    return (
        <App />
    );
};

if (document.getElementById("search_input_box")) {

    ReactDOM.render(
        <Provider store={STORE}>
            <Index />
        </Provider>,
        document.getElementById("search_input_box")
    );
}
export default Index
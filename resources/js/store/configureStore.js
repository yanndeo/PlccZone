import { createStore, applyMiddleware, compose } from "redux";

import thunk from "redux-thunk";

//notre seul reducer file .Si +sieurs autant utiliser un rootreducer
import rootReducer from './reducers/rootReducer';

const middleware = [thunk];



const store = createStore(
    rootReducer,
    compose(
        applyMiddleware(...middleware),
        window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ && window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__()
    )
);

export default store;
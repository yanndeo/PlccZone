import { createStore, applyMiddleware } from "redux";
import thunk from "redux-thunk";

//notre seul reducer file .Si +sieurs autant utiliser un rootreducer
import filterDataArticleList from './reducers/dataList_reducer';
import rootReducer from './reducers/rootReducer';


export default createStore(rootReducer, applyMiddleware(thunk));

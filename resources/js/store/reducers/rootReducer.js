import { combineReducers } from "redux";
import filterDataArticleList from './dataList_reducer';
import listeBrandANDCategory from './listes_reducer';
import alertMessage from "./alert_reducer";


const rootReducer = combineReducers({
    filterDataArticleList,
    listeBrandANDCategory,
    alertMessage,
});

export default rootReducer;
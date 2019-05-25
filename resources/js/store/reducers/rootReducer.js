import { combineReducers } from "redux";
import filterDataArticleList from './dataList_reducer';
import listeBrandANDCategory from './listes_reducer';


const rootReducer = combineReducers({
    filterDataArticleList,
    listeBrandANDCategory
});

export default rootReducer;
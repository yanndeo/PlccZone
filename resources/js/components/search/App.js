import React, { Component } from 'react'
import { API_END_POINT } from '../data/uri';
import {connect} from 'react-redux'
import axios from 'axios';
import Suggestions from './Suggestions';



class App extends Component {


    constructor(props) {
        super(props);
        this.state = {
            query: '' ,
            results: []
        };

    }

    handleInputChange(event){
        this.setState({ query: event.target.value },()=>{
            if(this.state.query && this.state.query.length > 0){
                if (this.state.query.length % 2 === 0) {
                    this.getInfo()
                }
            }
        });
    }


    getInfo(){
        axios.get(`${API_END_POINT}products/search/${this.state.query}`)
             .then(Response => {
                this.setState({ results: Response.data })
                console.log('getInfo',Response);

            }).catch((error) => {
                console.log(error);
            })
    }



    handleEraseResult(){
        this.setState({ results:[] , query: '' })
    }



    render () {
        console.log('SearchApp', this.props.articles)

        return (
            <div className="container">

                <form className="d-flex justify-content-between">
                    <input
                        type="text"
                        className="form-control"
                        id="search_input"
                        placeholder="Rechercher un article"
                        value={this.state.query}
                        onChange={()=>this.handleInputChange(event) }
                    />
                    
                    <button type="submit" className="btn"  onClick={()=>this.handleEraseResult()} />

                    <span
                        className="lnr lnr-cross"
                        id="close_search"
                        title="Close Search"
                        onClick={()=>this.handleEraseResult()}
                    />

                </form>
                <Suggestions results={this.state.results} />

            </div>
        );
    }
}

export default App;
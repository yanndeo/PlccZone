import React from 'react';

const Suggestions = (props) => {

    const options = props.results.map(r =>(
        <li className="list-group-item searchItem" key={r.id}>
            <a href={`/article/${r.slug}-${r.id}`}> {r.reference}--{r.name}  </a>
        </li>
    ))

    return <ul className="list-group"> {options} </ul>
};

export default Suggestions;


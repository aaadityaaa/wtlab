import React from "react";
import { useState } from "react";
import { useEffect } from "react";

 function App(){

  const [data, setData] = useState([])

  useEffect(()=>{
    fetch('http://localhost:8081/users')
    .then(res=>res.json())
    .then(data => {console.log(data);  setData(data)})
    .catch(err => console.log(err))
  }, [])
  return  <>
  {data.map((data, index)=>{
    return <div key={index}>
    <h1>Index: {index}</h1>
    <h2>Name: {data.fname + data.lname}</h2>
    <h3>Email: {data.email}</h3>
    <h4>Phone: {data.phone}</h4>
  </div>
  })}
  </>
  
}

export default App
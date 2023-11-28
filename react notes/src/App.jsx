// import { useState } from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
// import './App.css'

//in app.jsx, we have a function: App() and that function is being exported
// component is for breaking down individual parts of our application

// function App()  //function whic starts with capital letter and returns html is a component
// {
//   const [count, setCount] = useState(0)

//   return (
//     <>
//       <div>
//         <a href="https://vitejs.dev" target="_blank">
//           <img src={viteLogo} className="logo" alt="Vite logo" />
//         </a>
//         <a href="https://react.dev" target="_blank">
//           <img src={reactLogo} className="logo react" alt="React logo" />
//         </a>
//       </div>
//       <h1>Vite + React</h1>
//       <div className="card">
//         <button onClick={() => setCount((count) => count + 1)}>
//           count is {count}
//         </button>
//         <p>
//           Edit <code>src/App.jsx</code> and save to test HMR
//         </p>
//       </div>
//       <p className="read-the-docs">
//         Click on the Vite and React logos to learn more
//       </p>
//     </>
//   )
// }

// export default App

//in components, you can only ever return one element
//if you want to return multiple items, you can wrap them in an extra div, but that will lead to an extra div
//instead, you can wrap them in a fragment, which is an empty open and closing tag: <>......</>

import { useEffect, useState } from 'react'
import './style.css'
export default function App(){

  //const [newItem, setNewItem] = useState("easyonaadit")   //this is a hook inside of react. by default it is an empty string:
  //this returns 2 items: 1 is the new value for our item, and the next is the function which can be used to update the item value
  //newItem = 'hello' :--> this is not allowed, state values are immutable, they cannot be changed like this
  //setNewItem('hello')  //--> this fuction will update the value of the state to be whaterre is passed to the function. 
  //--> but this rerenders the entire component, and will cause an entire loop
  const [newItem, setNewItem] = useState(()=>{
    const localValue = localStorage.getItem("Items")
    if(localValue == null ) return []
    return JSON.parse(localValue)
  })
  
  const [todos, setTodos] = useState([]);

  const handleSubmit=(e)=>{
    e.preventDefault();

    setTodos(currentTodos =>{
      return [
        ...currentTodos,
        {id: crypto.randomUUID(), title: newItem, completed: false }
      ]
    })

    setNewItem("")
  }

  function toggletodos(id, completed){
    setTodos(currentTodos =>{
      return currentTodos.map(todo=>{
        if(todo.id == id){
          return {...todo, completed}
        }
        return todo
      })
    })
  }

  // const toggletodos=(id, completed)=>{
  //   setTodos(currentTodos =>{
  //     return currentTodos.map(todo =>{
  //       if(todo.id == id){
  //         return {...todo, completed}
  //       }
  //       return todo
  //     })
  //   })

  // }

  const deleteTodos=(id)=>{
    setTodos(currentTodos=>{
      return currentTodos.filter(todo =>todo.id != id)
    })
  }

  useEffect(()=>{
    localStorage.setItem("Items", JSON.stringify(todos))
  }, [todos])

  return <>
  <form onSubmit={handleSubmit} className="new-item-form">
    <div className="form-row">
      <label htmlFor="item">New item</label>
      <input value={newItem} onChange={e=> setNewItem(e.target.value)} type="text" id="item" />
    </div>
    <button className="btn">Add</button>
  </form>
  <h1 className="header">ToDo list  </h1>
  <ul className="list">
    {todos.length === 0 && "No Todos"}
    {todos.map(todo =>{
      return (
        <li key={todo.id}>
          <label>

        <input type="checkbox" checked={todo.completed }  onChange={e=>toggletodos(todo.id, e.target.checked)}/>
        {todo.title}
          </label>
          <button className="btn btn-danger" onClick={()=>deleteTodos(todo.id)}>Delete</button>
        </li>

      )
    })}
    
  </ul>
  </>
}

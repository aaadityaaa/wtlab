import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'


//hooks up our indexx.html with our react  code
//inside our index.html, we have only one div with ID=root
//this code targets that div, and renders the App.jsx into that div
ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
)

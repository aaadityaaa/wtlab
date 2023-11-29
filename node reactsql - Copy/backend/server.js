//1. npm init -y
//2. npm install express mysql cors
//3. npm create vite@latest
//4. node server.js

const express = require('express')
const cors = require('cors')
const mysql = require('mysql')

const app = express();
app.use(express.json())
app.use(cors())

const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "charity_db"
})

app.get('/', (req,res)=>{
    // res.json("Hello from Backend")
    const sql = 'SELECT * FROM student'
    db.query(sql, (err, data)=>{
        if(err) return res.json("Error")
        return res.json(data)
    })
})


app.post('/create', (req,res)=>{
    const sql = 'INSERT INTO student (`Name`, `Email`) VALUES (?)';
    const values = [
        req.body.name,
        req.body.email
    ]

    db.query(sql, [values], (err,data)=>{
        if(err) return res.json("Error")
        return res.json(data)
    })
})


app.listen(9876, ()=>{
    console.log("listing")
})
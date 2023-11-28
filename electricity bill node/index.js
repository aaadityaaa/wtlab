/*
1. npm init -y   --> load up a node project, this loads the package.json file
2. npm install express ejs body-parser  --> install all the nescessary packages
3. folders: views, public    --> the views folder contains the static views which can be loaded
                            --> the public folder contains the static files which need to be served
                            --> these are default folders, if added into this, we dont need to specify the path when calling these files.
4. index.js  -->this contains all the main server logic.
5. views/index.ejs  --> this contains the html files which can be served
6. public/script.js  --> this contains the js logic which is needed by the html file
7. package.json/scrips/'devStart':'node index.js'; --> this allows us to use npm run devStart
*/

//in the server:
/*
1. make an express app (2 step) 1. require('express')    2. app = express();
2. make the body-parser
3. make the app use express.static(public) to serve the static files
4. make the app use the body-parser
5. make the app use the ejs view engine
6. app.listen(port, ()=>{})  --> make the app listen on this port number
7. app.get('/', (req,res)=>{ res.render('index')})  --> when the initial get request is made, then we serve the index.ejs view from the default folder i.e. views. 
*/


// app.use()
// app.set()
// app.get()
// app.post()
// app.listen()


const bodyParser = require('body-parser')
const express = require('express')
const app = express()   //make an express application
const port = 3000

app.use(express.static('public'))
app.use(bodyParser.urlencoded({ extended: true }));


// app.set('views', 'randomviewfolder')  //--> by default the views are referenced from the index folder, we can use this line to change the default folder to set the views in.
app.set('view engine', 'ejs')  //tells express that views will be in ejs syntax

app.get('/', (req, res) => {
    res.render('index', { pageTitle: "Home", name: "Easyonaadit" })  //render the index.ejs file from the views folder: we can pass a JSON object also to the rendering ejs file and it will dynamically add that into the file
})

app.post('/calculate', (req,res)=>{
    const units = parseFloat(req.body.units)
    let bill = 0.0;

    if(units<=50){
        bill = units*3.5;
    }
    else if(units>50 && units<=150){
        bill = 50*3.5 + (units-50)*4;
    }
    else if(units >150 && units<=250){
        bill = 50*3.5 + 100*4 + (units-150)*5.2;
    }
    else{
        bill = 50*3.5 + 100*4 + 100*5.2 + (units-250)*6.5;
    }

    res.send({bill})
})


app.listen(port, ()=>{
    console.log(`the app is listening on port numeber ${port}`)
})

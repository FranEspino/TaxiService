
const express = require('express')
const app = express()

//setings
app.set('port',process.env.PORT || 3000)

//static files
let slash = '\\';
app.use(express.static(__dirname + slash +'public'))
 
// start the server
const server = app.listen(app.get('port'), ()=>{
    console.log('server on port ', app.get('port'))
});

const socketIO = require('socket.io')
const io = socketIO.listen(server)

//web socket
io.on('connection', () =>{
    console.log('new connection')
});






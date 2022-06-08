var express = require('express');
var app = express();
var http = require('http').Server(app);
var io  = require('socket.io')(http,{cors:{
    origin:"http://127.0.0.1:8000/JobPortal"
}})


var mysql = require('mysql');
// var momet = require('momet');
const { Socket } = require('dgram');
var socket = {};


var con = mysql.createConnection({
    host : 'localhost',
    user : 'root',
    password : '',
    database: 'job_portal'
});


con.connect(function(err){
    if(err)
    throw err;
    console.log("database Connected");
});

// io.on('connection',function(socket){
//     if(!sockets[socket.handshake.query.user_id]){
//         sockets[socket.handshake.query.user_id].push(socket);
//     }

//     socket.brodcast.emit('user_connected',socket.handshake.query.user_id)

//     con.query(`UPDATE users SET is_online = 1 where id = ${socket.handshake.query.user_id}`,function(err,res){

//         if(err)
//         throw err;
//         console.log('user connected',socket.handshake.query.user_id);

//     })

//     socket.on('disconnect',function(err){
//         socket.brodcast.emit('user disconnected',socket.handshake.query.user_id)
//         for(var index in sockets[socket.handshake.query.user_id]){
//             if(socket.id == sockets[socket.handshake.query.user_id]){
//                 sockets[socket.handshake.query.user_id].splice(index,1);
//             }
//         }

//         con.query(`UPDATE users SET is_online = 0 where id = ${socket.handshake.query.user_id}`,function(err,res){
//             if(err)
//             throw err;

//             console.log('user connected',socket.handshake.query.user_id);

//         })

//     })

// })

http.listen(3000)

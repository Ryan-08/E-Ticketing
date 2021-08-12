const express = require("express");
const formatMessage = require("./public/js/messages");
const {
  userJoin,
  getCurrentUser,
  userLeave,
  getRoomUsers,
} = require("./public/js/users");
const app = express();

const server = require("http").createServer(app);
const botname = "chatcord bot";
const io = require("socket.io")(server, {
  cors: { origin: "*" },
});

io.on("connection", (socket) => {
  //  Run when client connect
  console.log("connection");

  // join room  
    //   welcome user
  socket.emit("bot-message", formatMessage(botname, "welcome to chatcord"));
    //   broadcats when user connect     

  //   listen for chatMessage
  socket.on("chatMessage", (msg) => {    
    // io.broadcast.emit("send-message", formatMessage("user", msg));
     socket.broadcast      
      .emit(
        "receive-message",
        formatMessage("user", msg)
      );  
    socket.emit("send-message", formatMessage("user", msg));
  });

  /*from server side we will emit 'display' event once the user starts typing
    so that on the client side we can capture this event and display 
    '<data.user> is typing...' */
    socket.on('typing', (data)=>{
      if(data.typing==true)
         socket.broadcast.emit('display', data)
      else
         socket.broadcast.emit('display', data)
    })

  //   Run when client disconnect
  socket.on("disconnect", () => {    
      // io.emit(
      //   "bot-message",
      //   formatMessage(botname, `"user" has left the chat`)
      // );              
  });
});

server.listen(3000, () => {
  console.log("Server is running");
});

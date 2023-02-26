const express = require("express");
const {
  formatMessage,
  saveMessages,
  getMessages,
} = require("./public/js/messages");
const {
  userJoin,
  getCurrentUser,
  userLeave,
  getRoomId,
} = require("./public/js/users");
const app = express();

const server = require("http").createServer(app);
const botname = "bot E-ticketing";
const io = require("socket.io")(server, {
  cors: { origin: "*" },
});

const myroom = '';

io.on("connection", (socket) => {
  //  Run when client connect
  console.log("connection");

  // join room
  socket.on("joinRoom", ( username, room ) => {    
    const user = userJoin(socket.id, username, room);
    socket.join(user.room);

    //   welcome user
    socket.emit("bot-message", formatMessage(botname, "Selamat Datang Di Layanan Chat E-Ticketing"));
    //   broadcats when user connect
    socket.broadcast
      .to(user.room)
      .emit(
        "bot-message",
        formatMessage(botname, `${user.username} has joined the chat`)
      );    
    // get all message
    getMessages(room, function(result) {
        messages = result;        
        getRoomId(room, username, function(result) {
            id = result[0].id;
            no_ticket = result[0].no_ticket;
            messages.forEach(pesan => {              
              if (pesan.chat_id == id && pesan.no_ticket == no_ticket) {                
                // console.log("pesan kirim "+pesan.chat_id);
                socket.emit("send-message", formatMessage(username, pesan.message));
              } 
              if(pesan.chat_id != id && pesan.no_ticket == no_ticket){
                // console.log("pesan terima "+pesan.chat_id);
                socket.emit("receive-message", formatMessage(username, pesan.message));
              }
            });
        });
      });
  });  
    
  //   listen for chatMessage
  socket.on("chatMessage", (msg, username, room) => {    
    saveMessages(msg, username, room);           
    socket.to(room).emit("receive-message", formatMessage(username, msg));    
    socket.emit("send-message", formatMessage(username, msg));
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
    // console.log('diconnected')    
  });
});

server.listen(3000, () => {
  console.log("Server is running");
});

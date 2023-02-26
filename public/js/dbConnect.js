var mysql = require('mysql');
var data = [];
var db = mysql.createConnection({
  host: "127.0.0.1",
  user: "root",
  password: "",
  database: "e_ticketing"
});

db.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");  
});

module.exports = db;

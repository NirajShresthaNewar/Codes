module.exports = (sequelize, Sequelize) => {
    const StudentBlog = sequelize.define("studentMAnageBlog", {
      name: {
        type: Sequelize.STRING,
      },
      rollno: {
        type: Sequelize.INTEGER,
      },
        
       address:{
        type: Sequelize.STRING,

       },
       course:{
        type:Sequelize.STRING,
       },
       Enrolledyear:{
        type:Sequelize.STRING,
       },


      
      });
  
    return StudentBlog;
  };

  
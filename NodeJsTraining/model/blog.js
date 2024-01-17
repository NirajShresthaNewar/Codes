module.exports = (sequelize, Sequelize) => {
    const Blog = sequelize.define("blog", {//blog will be the table name in database
      name: {
        type: Sequelize.STRING,
      },
      desc: {
        type: Sequelize.STRING,
      },
      });
  
    return Blog;
  };

  
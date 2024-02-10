const {blogs} =require("../model/index.js");
//const blogs =require("../model/index.js").blogs;
exports.createBlog = async(req,res)=> {
  let data ={
        name:req.body.name,
        desc:req.body.desc,
    };
    let createdBlog = await blogs.create(data);
    if(createdBlog)
    {
        res.status(200).json({
            data:createdBlog,
            mesage:"create successfully"
        })
        
    }
    console.log(createdBlog);
};

exports.getBlogs=async (req,res)=>
{
    let result = await blogs.findAll();
    res.status(200).send(result);
};

exports.getBlogsById=async (req,res)=>
{
    let result = await blogs.findByPk(req.params.id);
    
    res.status(200).send(result);
};
exports.deleteBlogsById=async (req,res)=>
{
    let result = await blogs.findByPk(req.params.id);
    
    res.status(200).send(result);
};



// Export a function named 'updateBlog' that handles requests
exports.updateBlog = async (req, res) => {
  try {
    // Attempt to update a blog in the database
    let result = await blogs.update({
      // Spread the request body data to update the blog's attributes
      ...req.body},
      {

      // Specify the condition for updating:
      where: {
        id: req.params.id, // Update the blog with the matching ID
      },
    });

    // If successful, send a success response
    res.status(200).json({
      success: true,
      message: "Blog updated successfully",
    });
  } catch (error) {
    // Handle any errors that occur during the update
    console.error(error); // Log the error for debugging
    res.status(500).json({
      success: false,
      message: "Error updating blog",
    });
  }
};


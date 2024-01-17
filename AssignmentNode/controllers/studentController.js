const {Stsblogs} =require("../model/index.js");
exports.createItems = async(req,res)=> {
  let data ={
        name:req.body.name,
        rollno:req.body.rollno,
        address:req.body.address,
        course:req.body.course,
        Enrolledyear:req.body.Enrolledyear,

    };
    let createdItems = await Stsblogs.create(data);
    if(createdItems)
    {
        res.status(200).json({
            data:createdItems,
            message:"create successfully"
        })
        
    }
    console.log(createdItems);
};

exports.getItems=async (req,res)=>
{
    let result = await Stsblogs.findAll();
    res.status(200).send(result);
};

exports.getItemsById=async (req,res)=>
{
    let result = await Stsblogs.findByPk(req.params.id);
    
    res.status(200).send(result);
};
exports.deleteItemsById=async (req,res)=>
{
    let result = await Stsblogs.findByPk(req.params.id);
    
    res.status(200).send(result);
};


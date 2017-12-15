function dangeralert(name){
        $.bootstrapGrowl("Deadline Exceeded"+" "+name,{
            type: "danger",
            delay: 10000,
        });
        var a = new Audio('js/alertt.mp3'); // buffers automatically when created
        a.play();
    };

function warningalert(name){
        $.bootstrapGrowl("Deadline Date"+" "+name,{
            type: "warning",
            delay: 10000,
        });
  var a = new Audio('js/alertt.mp3'); // buffers automatically when created
  a.play();
    };
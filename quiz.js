$(function() {
  'use strict';

  $('.answer').on('click',function(){
    var $selected = $(this);
     if($("p").hasClass('correct')||$("p").hasClass('wrong')){
       return;
     }
     var answer = $selected.data('name');

    $.post('_answer.php',{
          answer:answer,
          token:$('#token').val()
    }).done(function(res){
          if(answer === res.correct_answer){
            // res.correct_answerに正解の答えが入っている(正解の場合)
            $selected.find('p').addClass('correct');
            $selected.find('p').text('CORRECT!');
          }else{
            //(不正解の場合)
            $selected.find('p').addClass('wrong');
            $selected.find('p').text('WRONG!');
          }
          $('#btn').removeClass('disabled');
    });
  });

  $('#btn').on('click',function(){
     if(!$(this).hasClass('disabled')){
       location.reload();
       // $quiz->checkAnswer();で$_SESSION['current_num']を1増やしているので、reload()するだけででよい
     }
  });
});

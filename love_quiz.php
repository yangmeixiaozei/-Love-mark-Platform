<?php
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<HTML>

<HEAD>
  <META name="generator" content="HTML Tidy for Windows (vers 25 January 2008), see www.w3.org">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <TITLE>恋爱知多少</TITLE>
  <STYLE type="text/css">
    #header {
      position: absolute;
      left: 32;
      top: 20;
    }

    #mainnav {
      position: absolute;
      left: 32;
      top: 82;
    }

    #q1 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
    }

    #q2 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #q3 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #q4 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #q5 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #q6 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #q7 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #q8 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #q9 {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #thanks {
      position: absolute;
      top: 250;
      left: 300;
      width: 300;
      visibility: hidden;
    }

    #qTracker {
      position: absolute;
      top: 250;
      left: 650;
    }

    #right {
      position: relative;
      color: green;
      visibility: hidden;
    }

    #wrong {
      position: relative;
      color: red;
      visibility: hidden;
    }

    .header {
      font-family: Arial Black;
      font-size: 50px;
      font-weight: bold;
    }

    .questionHd {
      font-family: verdana, sans-serif;
      font-size: 30px;
      font-weight: bold;
    }

    .trackerHd {
      font-family: verdana, sans-serif;
      font-size: 30px;
      font-weight: bold;
      font-style: italic;
    }

    .qText {
      font-family: verdana, sans-serif;
      font-size: 18px;
    }

    .bold {
      font-weight: bold;
    }

    body {
      background-image: url('image/8.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    #navigation {
      font-family: 微软雅黑;
      font-size: 12pt;
      text-align: center;
      padding-top: 6px;
    }

    #navigation ul {
      list-style: none;
      margin: 0;
      padding: 0;
      padding-top: 4px;
    }

    #navigation li {
      display: inline;
    }

    #navigation a:link,
    #navigation a:visited {
      margin-right: 2px;
      padding: 3px 10px 2px 10px;
      color: #277b3a;
      background-color: #e5f5c9;
      text-decoration: none;
      border-top: 1px solid #ffffff;
      border-left: 1px solid #ffffff;
      border-bottom: 1px solid #717171;
      border-right: 1px solid #717171;
    }

    #navigation a:hover {
      border-top: 1px solid #717171;
      border-left: 1px solid #717171;
      border-bottom: 1px solid #ffffff;
      border-right: 1px solid #ffffff;
    }
    .button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
  </STYLE>
  <SCRIPT language="JavaScript" type="text/javascript">

    // preload images
    for (i = 1; i < 10; i++) {
      current = new Image()
      eval("current.src= 'images/current" + i + ".gif'")
      unanswered = new Image()
      eval("unanswered.src= 'images/unanswered" + i + ".gif'")
      right = new Image()
      eval("right.src= 'images/right" + i + ".gif'")
      wrong = new Image()
      eval("wrong.src= 'images/wrong" + i + ".gif'")
    }

    // set some global variables
    rightAnswers = new Array("b", "c", "a", "c", "e", "h", "c", "c", "y")//设置正确答案
    numQuestions = rightAnswers.length
    currentQuestion = 1
    score = 0
    answeredElement = null
    formRef = ""
    qTrackerRef = ""

    // set global browser identification variables
    layerRef = "document.getElementById('";
    styleRef = ".style";
    endLayerRef = "')";
    formRef = "document.forms['"
    endFormRef = "']"


    function checkAnswer(q) {
      if (checkForAnswer(q)) {
        // determine actual answer

        eval("questionObj = " + formRef + "q" + q + "form" + endFormRef)
        answer = questionObj.elements[answeredElement].value

        // see if answer was right
        if (answer == rightAnswers[currentQuestion - 1]) {
          score = score + 10
          eval(qTrackerRef + layerRef + "wrong" + endLayerRef + styleRef + ".visibility = 'hidden'")
          eval(qTrackerRef + layerRef + "right" + endLayerRef + styleRef + ".visibility = 'visible'")
          updateQTracker('right', currentQuestion)
        }
        else {
          eval(qTrackerRef + layerRef + "right" + endLayerRef + styleRef + ".visibility = 'hidden'")
          eval(qTrackerRef + layerRef + "wrong" + endLayerRef + styleRef + ".visibility = 'visible'")
          updateQTracker('wrong', currentQuestion)
        }

        // move on to next question
        if (currentQuestion < numQuestions) {
          oldQuestion = currentQuestion
          currentQuestion = currentQuestion + 1
          nextQuestion(oldQuestion, currentQuestion)
        }
        else {
          quizFinished()
        }
      }
      else {
        // an answer wasn't chosen
        alert("Please choose one of the options.")
      }
    
    }


    function checkForAnswer(q) {
      // Determine which radio button is selected
      // Buttons are elements, so we don't want to 
      // count the answer button as a radio element
      eval("questionObj = " + formRef + "q" + q + "form" + endFormRef)
      numRadioOptions = questionObj.elements.length - 1

      // loop through all radio buttons for this question and
      // see if any of them are checked
      for (i = 0; i < numRadioOptions; i++) {
        if (questionObj.elements[i].checked) {
          answeredElement = i
          return true
        }
      }
      return false
    }


    function nextQuestion(oldQ, newQ) {
      // hide old question
      eval(layerRef + "q" + oldQ + endLayerRef + styleRef + ".visibility = 'hidden'")

      // show new question
      eval(layerRef + "q" + newQ + endLayerRef + styleRef + ".visibility = 'visible'")

      // update question tracker
      updateQTracker('current', newQ)
    }


    function updateQTracker(state, q) {
      eval(qTrackerRef + "document.images['t" + q + "'].src = 'images/" + state + q + ".gif'")
    }


    function quizFinished() {
      // hide old question & show "thank you" layer
      eval(layerRef + "q" + currentQuestion + endLayerRef + styleRef + ".visibility = 'hidden'")
      eval(layerRef + "thanks" + endLayerRef + styleRef + ".visibility = 'visible'")

      // display score
      formObj = document.forms['thanksForm']
      //最终的值
      formObj.endScore.value = score
    }


  </SCRIPT>
</HEAD>

<BODY>
  <div id="navigation">
    <table>
      <tr>
        <td><a href="user_homepage.php">首页</a></td>
        <td><a href="markdown.html">恋爱记录册</a></td>
        <td><a href="add_todo.php">学习小屋</a></td>
        <td><a href="sharepage.php">叽叽歪歪</a></td>
      </tr>
    </table>
  </div>
  <DIV id="mainnav">
    <SPAN class="header"> &#128151;恋爱二三事，你又知多少，快来测测吧! &#128151;</SPAN>
  </DIV>

  <DIV id="q1">
    <SPAN class="questionHd">Question 1&#10024</SPAN>

    <P><SPAN class="qText">&#127800我们的恋爱起始日</SPAN></P>

    <FORM name="q1form" id="q1form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q1answer" value="a">2022年5月20日<BR>
          <INPUT type="radio" name="q1answer" value="b">2022年6月11日<BR>
          <INPUT type="radio" name="q1answer" value="c">2023年9月26日</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(1)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="q2">
    <SPAN class="questionHd">Question 2&#10024</SPAN>

    <P><SPAN class="qText">&#127800我最近在读的一本书？</SPAN></P>

    <FORM name="q2form" id="q2form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q2answer" value="c">《布鲁克林有棵树》<BR>
          <INPUT type="radio" name="q2answer" value="d">《霍乱时期的爱情》<BR>
          <INPUT type="radio" name="q2answer" value="e">《面纱》<BR>
          <INPUT type="radio" name="q2answer" value="f">《地心游记》</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(2)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="q3">
    <SPAN class="questionHd">Question 3&#10024</SPAN>

    <P><SPAN class="qText">&#127800我喜欢的一首英文诗?</SPAN></P>

    <FORM name="q3form" id="q3form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q3answer" value="a">《How Do I Love Thee?》<BR>
          <INPUT type="radio" name="q3answer" value="b">《When You Are Old》<BR>
          <INPUT type="radio" name="q3answer" value="c">《I Wandered Lonely as a Cloud》</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(3)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="q4">
    <SPAN class="questionHd">Question 4&#10024</SPAN>

    <P><SPAN class="qText">&#127800我最近最喜欢吃的一道菜?</SPAN></P>

    <FORM name="q4form" id="q4form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q4answer" value="c">小炒黄牛肉<BR>
          <INPUT type="radio" name="q4answer" value="d">干锅鱿鱼虾<BR>
          <INPUT type="radio" name="q4answer" value="e">开心花甲粉</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(4)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="q5">
    <SPAN class="questionHd">Question 5&#10024</SPAN>

    <P><SPAN class="qText">&#127800我最近是不是很棒?</SPAN></P>

    <FORM name="q5form" id="q5form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q5answer" value="e">是的，你非常棒<BR>
          <INPUT type="radio" name="q5answer" value="f">一般，还需继续努力<BR>
          <INPUT type="radio" name="q5answer" value="g">批评，最近懒散，需要勤奋学习</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(5)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="q6">
    <SPAN class="questionHd">Question 6&#10024</SPAN>

    <P><SPAN class="qText">&#127800今天下午要和我一起在学习小屋学习吗？</SPAN></P>

    <FORM name="q6form" id="q6form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q6answer" value="h">要<BR>
          <INPUT type="radio" name="q6answer" value="g">不要</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(6)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="q7">
    <SPAN class="questionHd">Question 7&#10024</SPAN>

    <P><SPAN class="qText">&#127800我们要和好吗?</SPAN></P>

    <FORM name="q7form" id="q7form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q7answer" value="a">要<BR>
          <INPUT type="radio" name="q7answer" value="b">看情况<BR>
          <INPUT type="radio" name="q7answer" value="c">不要</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(7)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="q8">
    <SPAN class="questionHd">Question 8&#10024</SPAN>

    <P><SPAN class="qText">&#127800你20岁生日过得快乐吗?</SPAN></P>

    <FORM name="q8form" id="q8form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q8answer" value="c">非常快乐！（此选项为正确答案）<BR>
          <INPUT type="radio" name="q8answer" value="e">一般<BR>
          <INPUT type="radio" name="q8answer" value="d">不快乐</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(8)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="q9">
    <SPAN class="questionHd">Question 9&#10024</SPAN>

    <P><SPAN class="qText">&#127800这个假期我们去哪玩?</SPAN></P>

    <FORM name="q9form" id="q9form">
      <SPAN class="qText"><SPAN class="bold"><INPUT type="radio" name="q9answer" value="y">西安<BR>
          <INPUT type="radio" name="q9answer" value="x">新疆<BR>
          <INPUT type="radio" name="q9answer" value="z">长沙</SPAN></SPAN>

      <P><INPUT type="button" onclick="checkAnswer(9)" value="确认"></P>
    </FORM>
  </DIV>

  <DIV id="thanks">
    <SPAN class="questionHd">快来看看你的测试结果吧!</SPAN>

    <P><SPAN class="qText">&#10024温馨提示：只是一个小游戏，开心最重要！</SPAN><BR>
      <BR>
    </P>

    <FORM name="thanksForm" id="thanksForm">
      <SPAN class="qText">&#10024您的得分是： <INPUT type="text" name="endScore" size="2" readonly></SPAN>
    </FORM>
    <p>
      <a href="love_quiz_addcred.php" class="button">&#128151;确认&#128151;</a>
    </p>
    </DIV>
  <DIV id="qTracker">
    <SPAN class="trackerHd">Question tracker</SPAN>

    <TABLE>
      <TR>
        <TD><IMG src="images/current1.gif" alt="Question 1" name="t1" width="31" height="31" id="t1"></TD>

        <TD><IMG src="images/unanswered2.gif" alt="Question 2" name="t2" width="31" height="31" id="t2"></TD>

        <TD><IMG src="images/unanswered3.gif" alt="Question 3" name="t3" width="31" height="31" id="t3"></TD>
      </TR>

      <TR>
        <TD><IMG src="images/unanswered4.gif" alt="Question 4" name="t4" width="31" height="31" id="t4"></TD>

        <TD><IMG src="images/unanswered5.gif" alt="Question 5" name="t5" width="31" height="31" id="t5"></TD>

        <TD><IMG src="images/unanswered6.gif" alt="Question 6" name="t6" width="31" height="31" id="t6"></TD>
      </TR>

      <TR>
        <TD><IMG src="images/unanswered7.gif" alt="Question 7" name="t7" width="31" height="31" id="t7"></TD>

        <TD><IMG src="images/unanswered8.gif" alt="Question 8" name="t8" width="31" height="31" id="t8"></TD>

        <TD><IMG src="images/unanswered9.gif" alt="Question 9" name="t9" width="31" height="31" id="t9"></TD>
      </TR>
    </TABLE>

    <DIV id="right">
      That's correct!
    </DIV>

    <DIV id="wrong">
      WRONG!
    </DIV>
  </DIV>
</BODY>
</HTML>
<?php
if (!isset( $_SESSION[ 'nickname' ] )){
      echo '请先登录！'.'<br>'.'<a href="login.html">去登录</a>';
}
?>
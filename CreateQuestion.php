<?php $title = "Create Question"; include 'header.php';?>


<form method="post" action="CreateQuestionScript.php">

<div>
<label><span>Question:</span>
<input id="question" type="text" placeholder="Enter your question here" name="question">
</label>
</div>

<div>
<label><span>Answer option 1:</span>
<input type="text" placeholder="Enter answer option 1" name="ans0" />
</label>
<label><input type="hidden" name="is0" value="0" />
<input class="checkbox" type="checkbox" name="is0" value="1" /> <span>Correct</span>
</label>
</div>

<div>
<label><span>Answer option 2:</span>
<input type="text" placeholder="Enter answer option 2" name="ans1" />
</label>
<label><input type="hidden" name="is1" value="0" />
<input class="checkbox" type="checkbox" name="is1" value="1" /> <span>Correct</span>
</label>
</div>

<div>
<label><span>Answer option 3:</span>
<input type="text" placeholder="Enter answer option 3" name="ans2" />
</label>
<label><input type="hidden" name="is2" value="0" />
<input class="checkbox" type="checkbox" name="is2" value="1" /> <span>Correct</span>
</label>
</div>

<div>
<label><span>Answer option 4:</span>
<input type="text" placeholder="Enter answer option 4" name="ans3" />
</label>
<label><input type="hidden" name="is3" value="0" />
<input class="checkBox" type="checkbox" name="is3" value="1" /> <span>Correct</span>
</label>
</div>

<div>
</br>
<label><input type="hidden" name="cont" value="0" />
<input class="checkbox" type="checkbox" name="cont" value="1" /> <span>Finish</span>
</label>
</div>

<input type="submit" name="submit" value="Submit Question" />

</form>


<?php include 'footer.php';?>
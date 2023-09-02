<!-- THESE INPUTS ARE INFORMATION OF THE ALARM -->
<input type="hidden" id="alarmsListTimes" value="<?php echo implode(',', $alarmTimes)?>">
<input type="hidden" id="alarmsListNames" value="<?php echo implode(',', $alarmNames)?>">
<input type="hidden" id="alarmsListSongs" value="<?php echo implode('^', $alarmSongs)?>">
<input type="hidden" id="alarmsListIntevals" value="<?php echo implode(',', $alarmInteval)?>">

<audio src="../images/tones/best_alarm.mp3" id="alarmSong"></audio>


<!-- Alarm  POP UP-->
<div id="alarmPOP" class="alarmPOP">
    <div class="alarmPOP-content">
        <img width="84" height="84" src="https://img.icons8.com/cute-clipart/64/alarm-clock.png" alt="alarm-clock"/>
        <h2 style="margin-top: 40px;" id="alarmPOP-Name">ALARM NAME</h2>
        <h1 style="margin-top: 40px;" id="alarmPOP-time" class="alarmPOP-time">10:20</h1>
        <button style="margin-top: 40px;" id="alarmPOP-stpAlarm" class="btn btn-primary alarmPOP-stopBtn">STOP ALARM</button>
        
    </div>
</div>

<!-- ------------------------------------------------------------------------ -->

<!-- Remindser INPUTS for NAME-DESCRIPTION-PRIORITY AND DATE -->
<input type="hidden" id="remCardNames" value="<?php echo implode(',', $cardNames)?>">
<input type="hidden" id="remCardDescs" value="<?php echo implode(',', $cardDesc)?>">
<input type="hidden" id="remCardPriorities" value="<?php echo implode(',', $cardPriority)?>">
<input type="hidden" id="remCardDateTimes" value="<?php echo implode(',', $cardDateTime)?>">

<!-- Sticky note POP UP -->
<div id="cardRemPOP" class="cardRemPOP">
    <div class="cardRemPOP-content">
        <img id="stickyNote" width="500" height="500" src="../images/pinpng.com-sticky-note-png-1821509.png" alt="Sticky NOTE"/>
        <div class="cardDiv">
            <h1 class="card-title">HEADER</h1>
            <p class="card-descr">A paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs.</p>
        </div>
        <span class="cardRemPO-close" ><button class="cardRemPOP-stopBtn" ><i class="fa-solid fa-thumbtack"></i></button></span>
        
    </div>
</div>

<br/><br/><br/>
<footer class="bg-light text-center">
    <div class="container p-4 pb-0">
        <section class="">
            <form action="">
                <div class="row d-flex justify-content-center">
                    
                    <div class="col-auto">
                        <p class="pt-2">
                        <strong>Sign up for our newsletter</strong>
                        </p>
                    </div>
                    
                    <div class="col-md-5 col-12">
                    
                        <div class="form-outline mb-4">
                        <input type="email" id="subscribe" class="form-control" placeholder="Enter Email here"/>
                        </div>
                    </div>
                    
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-4">
                            Subscribe
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-dark" href="#">CHICKEN BOT/Mlothekile</a>
    </div>
</footer>
<!-- SCRIPTS -->
<!--JAVA_SCRIPT-->
<script src="https://kit.fontawesome.com/a035f24907.js" crossorigin="anonymous"></script>

<!--bootstrap javascript-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="../js/setAlarms.js"></script>
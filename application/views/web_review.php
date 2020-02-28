<style>
small{
    color: rgb(156, 156, 156);
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 5px;
    background: rgb(1, 61, 66);
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: rgb(2, 222, 230);
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: rgb(2, 222, 230);
    cursor: pointer;
}

</style>
<div class="container">
            <h2 class="text-left mb-5">
                Rate <?php 
                        if($review != null){ 
                            echo form_open('user/webReview/delete');
                            echo form_hidden('idWebReview',$review['idWebReview']);
                            echo form_hidden('tblUser_idUser',$_SESSION['userid']);
                            $data = array('name'=>'rate',
                                'type' => 'submit',
                                'id'=>'',
                                'value'=>'Delete My Review',
                                'class'=>'btn btn-danger');
                            echo form_submit($data);
                            echo form_close();
                        }?>
            </h2>
            
            <div class="row justify-content-start ">
                <?php 
                    $action = "update";
                    if($review == null){
                        $action = "create";
                        $review['decAccuracy']=0;
                        $review['decAuthority']=0;
                        $review['decObjectivity']=0;
                        $review['decCurrency']=0;
                        $review['decCoverage']=0;
                        $review['strComment']=0;
                    } 
                    echo form_open('user/webReview/'.$action);

                    echo form_hidden('idWebReview',$review['idWebReview']);
                    echo form_hidden('tblUser_idUser',$_SESSION['userid']); 
                ?>
                
                <div class="container">
                    <label for="directing" class="h3 text-info">Accuracy:</label>
                    <span id="directing_value" class="text-warning font-weight-bold h5 float-right display-4"><?=$review['decDirecting']?></span>
                </div>
                    <div class="slidecontainer bg-transparent mb-5">
                        <input name="decAccuracy" type="range" min="1" max="10" value="<?=$review['decAccuracy']?>" step="0.1" class="slider" 
                        id="directing" onchange="show_value(this.value,'directing_value');overAll()">
                        <small>There are few standards to verify the accuracy of information on the web. It is the responsibility
of the reader to assess the information presented.
                        </small>
                    </div>

        
                <div class="container">
                    <label for="writing" class="h3 text-info">Writing:</label>
                    <span id="writing_value" class="text-warning font-weight-bold h5 float-right display-4"><?=$review['decWriting']?></span>
                </div>
                <div class="slidecontainer bg-transparent mb-5">
                    <input name="decWriting" type="range" min="1" max="10" value=<?=$review['decWriting']?> step="0.1" class="slider" id="writing" 
                    onchange="show_value(this.value,'writing_value');overAll()">
                        <small>In screenplays, the first major moment you should be on 
                            the lookout for is the inciting incident. Generally, around 
                            the ten-minute mark there will be a moment that drives 
                            the protagonist toward the story that will dominate the remainder of the film. 
                            Around the thirty-minute mark, there is usually a major turning point — 
                            the moment in which there is no going back for the protagonist — that signals 
                            the beginning of the second act where the majority of the film will take place. 
                            Finally, around the ninety-minute mark, the second turning point will signal 
                            the film’s drive towards both its conclusion and resolution.
                        </small>
                </div>


                <div class="container">
                    <label for="cinematography" class="h3 text-info">Cinematography:</label>
                    <span id="cinematography_value" class="text-warning font-weight-bold h5 float-right display-4"><?=$review['decCinematography']?></span>
                </div>
                <div class="slidecontainer bg-transparent mb-5">
                    <input name="decCinematography" type="range" min="1" max="10" value="<?=$review['decCinematography']?>" step="0.1" class="slider" id="writing" 
                    onchange="show_value(this.value,'cinematography_value');overAll()">
                        <small>
                            This may include picking the camera, choosing lenses, 
                            lighting the scene, or any other photographic choice that can 
                            best produce the vision of the director.
                        </small>
                </div>


                <div class="container">
                    <label for="editing" class="h3 text-info">Editing:</label>
                    <span id="editing_value" class="text-warning font-weight-bold h5 float-right display-4"><?=$review['decEditing']?></span>
                </div>
                <div class="slidecontainer bg-transparent mb-5">
                    <input name="decEditing" type="range" min="1" max="10" value="<?=$review['decEditing']?>" step="0.1" class="slider" id="writing" 
                    onchange="show_value(this.value,'editing_value');overAll()">
                        <small>Editing is the actual cuts —
                             back in the days of film it was literally physical cuts in the film — 
                             that exist in the film, both within scenes and from scene to scene.
                        </small>
                </div>


                <div class="container">
                    <label for="acting" class="h3 text-info">Acting:</label>
                    <span id="acting_value" class="text-warning font-weight-bold h5 float-right display-4"><?=$review['decActing']?></span>
                </div>
                <div class="slidecontainer bg-transparent mb-5">
                    <input name="decActing" type="range" min="1" max="10" value="<?=$review['decActing']?>" step="0.1" class="slider" id="writing" 
                    onchange="show_value(this.value,'acting_value');overAll()">
                        <small>Many of the things to consider when it comes 
                            to acting are similar to what you can watch for in the screenplay. 
                            What is the character’s goal? What is his or her character 
                            development? Is the character’s filmic journey satisfying? 
                            From there, you might start to think about whether 
                            the actor achieved these goals successfully and why or why not.
                        </small>
                </div>


                <div class="container">
                    <label for="design" class="h3 text-info">Production Design:</label>
                    <span id="design_value" class="text-warning font-weight-bold h5 float-right display-4"><?=$review['decProdDesign']?></span>
                </div>
                <div class="slidecontainer bg-transparent mb-5">
                    <input name="decProdDesign" type="range" min="1" max="10" value="<?=$review['decProdDesign']?>" step="0.1" class="slider" id="writing" 
                    onchange="show_value(this.value,'design_value');overAll()">
                        <small>Another unsung hero of film production, 
                            the production designer or art director is 
                            the person tasked with building up the world 
                            where the characters exist. He or she collaborates 
                            with both the director and director of photography 
                            to achieve the aesthetic demands of the project while 
                            guiding the costume designer, make-up stylists, 
                            and other similar departments in order to achieve 
                            the director’s overall vision.
                        </small>
                </div>

                <div class="container">
                    <label for="sound" class="h3 text-info">Sound:</label>
                    <span id="sound_value" class="text-warning font-weight-bold h5 float-right display-4"><?=$review['decSound']?></span>
                </div>
                <div class="slidecontainer bg-transparent mb-5">
                    <input name="decSound" type="range" min="1" max="10" value="<?=$review['decSound']?>" step="0.1" class="slider" id="writing" 
                    onchange="show_value(this.value,'sound_value');overAll();">
                        <small>Another unsung hero of film production, 
                            the production designer or art director is 
                            the person tasked with building up the world 
                            where the characters exist. He or she collaborates 
                            with both the director and director of photography 
                            to achieve the aesthetic demands of the project while 
                            guiding the costume designer, make-up stylists, 
                            and other similar departments in order to achieve 
                            the director’s overall vision.
                        </small>
                </div>

                <?php
                    $comment = ($review != null)? $review['strComment']:'';
                    $data = array('name'=>'strComment',
                                    'type' => 'text',
                                    'id'=>'strComment',
                                    'class'=>'form-control mb-5',
                                    'value'=> $comment);
                    echo form_label('Comment','comment','class="h3 text-info "');
                    echo form_textarea($data);
                ?>
            </div>

            <div class="row justify-content-start border-top pt-5">
                <div class="container">
                    <label class="h3 text-info">TOTAL RATING:</label>
                    <span id="total_value" class="text-warning font-weight-bold h5 float-right display-4"  onload="overAll()"></span>
                </div>
            </div>

            <div class="row justify-content-start bt-5">
                <?php
                    $data = array('name'=>'rate',
                    'type' => 'submit',
                    'id'=>'',
                    'value'=>'RATE',
                    'class'=>'btn btn-warning mt-5 mx-auto');
                    echo form_submit($data);
                    echo form_close();
                ?>
            </div>

</div>
<script>
    function show_value(val, id) {
        document.getElementById(id).innerHTML=val;
    }

    function overAll(){
        var directing = Number(document.getElementById('directing_value').innerHTML);
        var writing = Number(document.getElementById('writing_value').innerHTML);
        var cinematography = Number(document.getElementById('cinematography_value').innerHTML);
        var editing = Number(document.getElementById('editing_value').innerHTML);
        var acting = Number(document.getElementById('acting_value').innerHTML);
        var design = Number(document.getElementById('acting_value').innerHTML);
        var sound = Number(document.getElementById('sound_value').innerHTML);
        var total = (directing + writing + cinematography + editing + acting + design + sound)/7;
        document.getElementById('total_value').innerHTML= total.toFixed(2);
        console.log(total);
    }
</script>

<div class="bg-modal">
<?php array_print($data)?>
        <div class="modal" id="jess_modal">
        <form action="" id="manage-question" method="POST">
                <input type="text" name="qid" value="<?php echo isset($data['qid']) ? $data['qid'] : ''?>">
                <input type="text" name="sid" value="<?php echo isset($data['sid']) ? $data['sid'] : ''?>">
                <h1>New Question</h1>
                <span class="ekis">&#10006</span>
                <hr>
                <div class="modal-container">
                    <div class="question-type">
                        <h3>Question</h3>
                        <textarea name="question_field" cols="30" rows="10"><?php echo isset($data['question']) ? $data['question']->question : '   ' ?></textarea>
                        <h3>Question Answer Type</h3>
                        <select name="question_type">
                            <?php if(isset($id)):?>
                                <option value="" diasbled="" selected="">Please Select here</option>
                            <?php endif;?>
                            <option value="radio" <?php echo isset($data['question']->type) && $data['question']->type == 'radio' ? 'selected' :'' ?>>Single Answer/Radio Button</option>
                            <option value="check" <?php echo isset($data['question']->type) && $data['question']->type == 'check' ? 'selected' :'' ?>>Multiple Answer/Check Box</option>
                            <option value="textfield_s" <?php echo isset($data['question']->type) && $data['question']->type == 'textfield_s' ? 'selected' :'' ?>>Open-Ended Question</option>
                        </select>
                    </div>
                    <div class="question-preview">
                        <h3>Preview</h3>
                            <div class="preview">
                                <!-- PASOK NG TYPE NG QUESTION -->
                                <?php if(!isset($data['qid'])):?>
                                <h3 style="text-align:center">Select Question Answer type first</h3>
                                <?php else:?>
                                    <div class="callout callout-info">
                                    <?php if($data['question']->type != 'textfield_s'):
                                        $type = $data['question']->type == 'radio' ? 'radio' : 'checkbox';    
                                    ?>
                                        <table class="table" width="100%">
                                            <colgroup>
                                                <col width="10%"> 
                                                <col width="80%"> 
                                                <col width="10%"> 
                                            </colgroup>
                                            <thead class="table-head">
                                                <tr class="">
                                                    <th></th>
                                                    <th class="table-head-title">Label</th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-body">
                                                <?php 
                                                    $i = 0;
                                                    foreach(json_decode($data['question']->frm_option) as $key => $value):
                                                    $i++;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div data-count = '1'>
                                                            
                                                            <input type="<?php echo $type?>" id="<?php echo $type?>Primary<?php echo $i?>" name="<?php echo $type?>" 
                                                            <?php echo($type == 'radio') ? "checked= ' ' " : '' ?>>
                                                            <label for="<?php echo $type?>Primary<?php echo $i?>">
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <input type="text" name="label[]" class="form-control" value="<?php echo $value?>">
                                                    </td>

                                                    <td class="btn-opt-delete"></td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        <div class="btn-add-opt">
                                            <button class="btn-add" type="button" onclick="new_<?php echo $type?>($(this))">Add</button>
                                        </div>
                                        <?php else:?>
                                            <textarea name="frm_opt" cols="30" rows="10" class="form-control"   placeholder="Write Something here..."></textarea>
                                        <?php endif;?>
                                    </div>   
                                    
                                <?php endif;?>
                            </div>
                    </div>
                </div>
                <div class="modal-btns">
                    <button class="btn-q btn-save-question">Save</button>
                    <button type="button" class="btn-q btn-cancel-question">Cancel</button>
                </div>
        </form>
        </div>
</div>



<div id="check_opt_clone" style="display:none">
        <div class="callout callout-info">
            <table class="table" width="100%">
                <colgroup>
                    <col width="10%"> 
                    <col width="80%"> 
                    <col width="10%"> 
                </colgroup>
                <thead class="table-head">
                    <tr class="">
                        <th></th>
                        <th class="table-head-title">Label</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <tr>
                        <td>
                            <div data-count = '1'>
                                <input type="checkbox" id="checkPrimary1" name="check" checked=''>
                                <label for="checkPrimary1">
                                </label>
                            </div>
                        </td>

                        <td>
                            <input type="text" name="label[]" class="form-control">
                        </td>

                        <td class="btn-opt-delete"></td>
                    </tr>

                    <tr>
                        <td>
                            <div data-count = '2'>
                                <input type="checkbox" id="checkPrimary2" name="check" checked=''>
                                <label for="checkPrimary2">
                                </label>
                            </div>
                        </td>

                        <td>
                            <input type="text" name="label[]" class="form-control">
                        </td>

                        <td class="btn-opt-delete"></td>
                    </tr>
                </tbody>
            </table>
            <div class="btn-add-opt">
                <button class="btn-add" type="button" onclick="new_check($(this))">Add</button>
            </div>
        </div>   
    </div>

    <div id="radio_opt_clone" style="display:none">
        <div class="callout callout-info">
            <table class="table" width="100%">
                <colgroup>
                    <col width="10%"> 
                    <col width="80%"> 
                    <col width="10%"> 
                </colgroup>
                <thead class="table-head">
                    <tr class="">
                        <th></th>
                        <th class="table-head-title">Label</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <tr>
                        <td>
                            <div data-count = '1'>
                                <input type="radio" id="radioPrimary1" name="radio" checked=''>
                                <label for="radioPrimary1">
                                </label>
                            </div>
                        </td>

                        <td>
                            <input type="text" name="label[]" class="form-control">
                        </td>

                        <td class="btn-opt-delete"></td>
                    </tr>

                    <tr>
                        <td>
                            <div data-count = '2'>
                                <input type="radio" id="radioPrimary2" name="radio" checked=''>
                                <label for="radioPrimary2">
                                </label>
                            </div>
                        </td>

                        <td>
                            <input type="text" name="label[]" class="form-control">
                        </td>

                        <td class="btn-opt-delete"></td>
                    </tr>
                </tbody>
            </table>
            <div class="btn-add-opt">
                <button class="btn-add" type="button" onclick="new_radio($(this))">Add</button>
            </div>
        </div>   
    </div>


    <div id="textfield_opt_clone" style="display:none">
        <div class="callout callout-info">
            <textarea name="frm_opt" id="" cols="30" rows="10" class="form-control"   placeholder="Write Something here..."></textarea>
        </div>
    </div>


<script>
   

    $(document).ready(function(){
        $('#manage-question').submit(function(e){
            e.preventDefault();
            //console.log('asd' + $('#manage-question').serialize());
            //console.log(new FormData($(this)[0]));
            $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/save_question',
                data: new FormData($(this)[0]), 
                cache: false,
		        contentType: false,
		        processData: false,
                method: 'POST',
                type: 'POST',
                success:function(res){
                    console.log(res);
                    setTimeout(function(){
                        location.reload();
                    },1200)
                }, 
                error: function(er){
                    console.log(er);
                }
            })
     })

        $('[name=question_type]').change(function(){
            //console.log('working');
            check($(this).val());
        })

        function check(type){
            if(type == 'radio'){
                radio_opt();
            }
            if(type =='check'){
                check_opt();
            }
            if(type == 'textfield_s'){
                textfield_opt();
            }
        }

        function radio_opt(){
            var radio_opt_clone = $('#radio_opt_clone').clone();
            $('.preview').html(radio_opt_clone.html());
        }

        function check_opt(){
            var check_opt_clone = $('#check_opt_clone').clone();
            $('.preview').html(check_opt_clone.html());
        }

        function textfield_opt(){
            var textfield_opt_clone = $('#textfield_opt_clone').clone();
            $('.preview').html(textfield_opt_clone.html());
        }    
    });

        function new_checkbox(_this){
            const tbody = _this.closest('.btn-add-opt').siblings('table').find('tbody');
            let count = tbody.find('tr').last().find('div').attr('data-count');
            count++;
            let opt = ` <td>
                            <div data-count = '${count}'>
                                <input type="checkbox" id="checkPrimary${count}" name="check" checked=''>
                                <label for="checkPrimary${count}">
                                </label>
                            </div>
                        </td>

                        <td>
                            <input type="text" name="label[]" class="form-control">
                        </td>

                        <td class="btn-opt-delete"><button onclick="delete_row($(this))">&#10006</button></td>`;
            const tr =  $('<tr> </tr>');
            tr.append(opt);
            tbody.append(tr);
        }
        
        function new_radio(_this){
            const tbody = _this.closest('.btn-add-opt').siblings('table').find('tbody');
            let count = tbody.find('tr').last().find('div').attr('data-count');
            count++;
            let opt = `<td>
                            <div data-count = '${count}'>
                                <input type="radio" id="radioPrimary${count}" name="radio" checked=''>
                                <label for="radioPrimary${count}">
                                </label>
                            </div>
                        </td>

                        <td>
                            <input type="text" name="label[]" class="form-control">
                        </td>

                        <td class="btn-opt-delete"><button onclick="delete_row($(this))">&#10006</button></td>`;
            const tr =  $('<tr> </tr>');
            tr.append(opt);
            tbody.append(tr);
        }

        function delete_row(_this){
            const trow = _this[0].parentNode.parentNode;
            trow.remove();
        }

        
</script>
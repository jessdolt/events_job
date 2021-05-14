<?php require APPROOT . '/views/inc/header.php'; ?>
    
    <div class="root">
        <div class="survey-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Survey View</h1>
               
                <hr>
            </div>
            <div class="survey-info-container">
                <div class="survey-info">
                    <h1>Title</h1>
                    <p>Description</p>
                    <p>Start Date</p>
                    <p>End Date</p>
                </div>
                <div class="survey-question">
                    <button id="btn-question" class="btn-quest">Add New Question</button>
                
                    <div class="questions">
                        <h4>Sample Question For CheckBoxes</h4>
                        <div class="form-group-survey">
                            <input type="checkbox" name="check1">
                            <label for="">Check 1</label>
                        </div>
                        <div class="form-group-survey">
                            <input type="checkbox" name="check2">
                            <label for="">Check 2</label>
                        </div>
                        <div class="form-group-survey">
                            <input type="checkbox" name="check3">
                            <label for="">Check 3</label>
                        </div>
                    </div>

                    <div class="questions">
                        <h4>Sample Question For RadioButtons</h4>
                        <div class="form-group-survey">
                            <input type="radio" name="radio1">
                            <label for="">Radio 1</label>
                        </div>
                        <div class="form-group-survey">
                            <input type="radio" name="radio2">
                            <label for="">Radio 2</label>
                        </div>
                        <div class="form-group-survey">
                            <input type="radio" name="radio3">
                            <label for="">Radio 3</label>
                        </div>
                    </div>

                    <div class="questions">
                        <h4>Sample Question For TextField</h4>
                        <div class="form-group-survey">
                            <textarea name="textfield" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-modal">
        <div class="modal" id="jess_modal">
                <h1>New Question</h1>
                <span class="ekis">&#10006</span>
                <hr>
                <div class="modal-container">
                    <div class="question-type">
                        <h3>Question</h3>
                        <textarea name="question_field" id="" cols="30" rows="10"></textarea>
                        <h3>Question Answer Type</h3>
                        <select name="question_type" id="">
                            <option value="check">Multiple Answer/Check Box</option>
                            <option value="radio">Single Answer/Radio Button</option>
                            <option value="open-ended">Open-Ended Question</option>
                        </select>
                    </div>
                    <div class="question-preview">
                        <h3>Preview</h3>
                            <div class="preview">

                            </div>
                    </div>
                </div>
                <div class="modal-btns">
                    <button class="btn-q btn-save-question">Save</button>
                    <button class="btn-q btn-cancel-question">Cancel</button>
                </div>
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
            <textarea name="frm_opt" id="" cols="30" rows="10" class="form-control" disabled=""  placeholder="Write Something here..."></textarea>
        </div>
    </div>

<script>
    $(document).ready(function(){
        previewSurvey();

        $('[name=question_type]').change(function(){
            console.log('working');
            check($(this).val());
        })

        function check(type){
            if(type == 'radio'){
                radio_opt();
            }
            if(type =='check'){
                check_opt();
            }
            if(type == 'open-ended'){
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
        function new_check(_this){
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

<script>
    
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
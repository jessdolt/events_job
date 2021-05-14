<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Group</h1>
    <?php array_print($data);?>
    <div class="root">
        <div class="group-nav">
        <div class="add-dept">
            <a href="<?php echo URLROOT;?>/sideNav/new_dept">Add New Department</a>
        </div>
        <div class="add-batch">
             <a href="<?php echo URLROOT;?>/sideNav/new_batch">Add New Batch</a>
        </div>
        </div>
    </div>
                <ul class="groupList">
                    
                    <li class="group">
                        <button class="groupHeader">
                            dcet 
                            <span class="icon dropArrow">
                                <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                                </svg>
                            </span>
                            <!-- <span class="groupUserCount">00000</span> -->
                        </button>
                        <ul class="subGroupList">
                            <li class="subGroup">
                                <button>Batch 2021</button>
                            </li>
                            <li class="subGroup">
                                <button>Batch 2021</button>
                            </li>
                        </ul>
                    </li>
                   
                </ul>


<?php require APPROOT . '/views/inc/footer.php'; ?>

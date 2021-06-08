



        $('#up-vote').click(function(){
            var parentContainer = $(this.parentNode);
            var v_count = $('#vote-count').text();
            var vote_count = parseInt(v_count);

            var voteType = parentContainer.attr('votetype');
            if(voteType == 'normal'){
                parentContainer.attr('votetype', 'up');
                var up_voted = vote_count + 1;
                $('#vote-count').html(up_voted);
            }

            else if(voteType == 'up'){
                parentContainer.attr('votetype','normal');
                var normal_state = vote_count-1;
                //console.log(normal_state);
                $('#vote-count').html(normal_state);
            }
            else if(voteType == 'down'){
                parentContainer.attr('votetype', 'up');
                var up_voted = vote_count+2;
                $('#vote-count').html(up_voted);
            }
            
           
            
        })

        $('#down-vote').click(function(){
            var parentContainer = $(this.parentNode);
            var v_count = $('#vote-count').text();
            var vote_count = parseInt(v_count);

            var voteType = parentContainer.attr('votetype');
            if(voteType == 'normal'){
                parentContainer.attr('votetype', 'down');
                var down_voted = vote_count-1;
                $('#vote-count').html(down_voted);
            }
            else if(voteType == 'down'){
                parentContainer.attr('votetype','normal');
                var normal_state = vote_count+1;
                $('#vote-count').html(normal_state);
            }
            else if(voteType == 'up'){
                parentContainer.attr('votetype', 'down');
                var down_voted = vote_count-2;
                $('#vote-count').html(down_voted);
            }
           
           
        // function check(_this){
            
            //     //console.log(_this);
            //     _this.attr('isVote', '1');
            //     //console.log(_this.attr('isVote'));
            // }
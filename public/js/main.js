function previewSurvey(){
    //const btnQuestion = document.getElementById('btn-question');
    // btnQuestion.addEventListener('click', function(){
    //         modal.classList.add('--active');
    // })
    const modal = document.querySelector('.bg-modal');
    const ekis = document.querySelector('.ekis');
    modal.classList.add('--active');
    ekis.addEventListener('click', function(){
            modal.classList.remove('--active');
    })
}


function previewCover(){
    //const btnQuestion = document.getElementById('btn-question');
    // btnQuestion.addEventListener('click', function(){
    //         modal.classList.add('--active');
    // })
    const photoModal = document.querySelector('.bg-photoModal');
    const btnClose = document.getElementById('btnCoverClose');
    photoModal.classList.add('showModal');
    btnClose.addEventListener('click', function(){
            photoModal.classList.remove('showModal');
    })
}

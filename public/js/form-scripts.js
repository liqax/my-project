document.addEventListener('DOMContentLoaded', function() {
    const examTypeSelect = document.getElementById('examType');
    const hskLevelGroup = document.getElementById('hskLevelGroup');
    const hskkLevelGroup = document.getElementById('hskkLevelGroup');
    const yctLevelGroup = document.getElementById('yctLevelGroup');

    function toggleLevelFields() {
        const selectedExamType = examTypeSelect.value;

        // Hide all level groups initially
        hskLevelGroup.style.display = 'none';
        hskkLevelGroup.style.display = 'none';
        yctLevelGroup.style.display = 'none';

        // Set required to false for all, will be set to true for the visible one
        document.getElementById('hskLevel').required = false;
        document.getElementById('hskkLevel').required = false;
        document.getElementById('yctLevel').required = false;

        // Show the relevant level group and set it as required
        if (selectedExamType === 'HSK') {
            hskLevelGroup.style.display = 'block';
            document.getElementById('hskLevel').required = true;
        } else if (selectedExamType === 'HSKK') {
            hskkLevelGroup.style.display = 'block';
            document.getElementById('hskkLevel').required = true;
        } else if (selectedExamType === 'YCT') {
            yctLevelGroup.style.display = 'block';
            document.getElementById('yctLevel').required = true;
        }
    }

    // Add event listener for when the exam type changes
    examTypeSelect.addEventListener('change', toggleLevelFields);

    // Call it once on page load to set initial state based on default selection
    toggleLevelFields();
});
// Example Basic
$("#example-basic").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	autoFocus: true,
});


// Example Form
$("#steps-div").steps({	
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	autoFocus: true,
	onFinished: function (event, currentIndex) {
		$("#steps-form").submit();
	},
	labels: {
        current: "current step:",
        pagination: "Pagination",
        finish: "Send",
        next: "Next",
        previous: "Prev",
        loading: "Waiting..."
    }
});


// Example Vertical
$("#example-vertical").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	stepsOrientation: "vertical"
});
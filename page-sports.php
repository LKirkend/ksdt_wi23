<?php get_header();?>

<script>
    const date = /[A-S][a-z]+\s[0-9]+\s\([A-Za-z]+\)/mg;
    const time = /[1-9]+:*[0-9]*\s[APM]+/mg;
    const loc = /(Home|Away|Neutral)\s+\K([A-Za-z‘:,.']+\s)+/mg
    const results = /((?<=\s)([WLT]\s[0-9]+-[0-9]+)|(Postponed|Cancelled)|((\s{4})(?=\n)))/mg;
    const overall = /Overall\s*[0-9]+-[0-9]+/;
    
    getTextData("http://localhost:8080/services/schedule_txt.ashx?schedule=372").then((baseball => {
        console.log(results.exec(baseball));
    }));
    async function getTextData(theUrl) {
        return await fetch(theUrl, 
        {
            method: 'GET',
            headers: {
                "Target-URL": "https://ucsdtritons.com",
            },
        }).then(response => {
            if (!response.ok) {
                throw new Error("HTTP error " + response.status);
            }
            return response.text();
        }).then(text => {
            return text;
        });
    }
</script>
<?php get_footer();?>
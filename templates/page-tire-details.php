<?php 
/**
 * Template Name: Tyre
 */

 get_header();
?>

 <main id="site-content" role="main">
    <table>
        <tr>
            <td>Brand ID</td>
            <td>Brand Name </td>
            <td>Show</td>
            <td>Slug</td>
            <td>Brand Logo</td>
            <td>Brand Description</td>
            <td>Brand Country </td>
        </tr>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . 'tyre';

        $sql = "SELECT * FROM $table_name";

        $table_details = $wpdb->get_results($sql);

        foreach($table_details as $info_row){
            ?>
            <tr>
                <td><?php echo $info_row->brand_id; ?></td>
                <td><?php echo $info_row->brand_name; ?></td>
                <td><?php echo $info_row->brand_show; ?></td>
                <td><a href="#" onclick="pop_up('<?php echo $info_row->tyre_id; ?>')"><?php echo $info_row->brand_slug; ?></a></td>
                <td><?php echo $info_row->brand_logo; ?></td>
                <td><?php echo substr($info_row->brand_description,0,30); ?></td>
                <td><?php echo $info_row->brand_country;?></td>
            </tr>
            <?php
        }
       
        ?>
       
    </table>
    <script>
        function pop_up(id){
            
            userAction(id)
        }
        const userAction = async (id) => {
            const response = await fetch('https://api.tyrepedia.com/api/v1/brand/' + id,{
                headers:{
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgwN2Y2YWMyYTYxYTdhMzc4YjY2ZGQzMWU3MzEyZWI3M2Q5Y2FiNGI2ZmJkNzEzMDkwZTMwYzFmYjVmYjBhODM0MjM3MWQ1ZTg1NmMxYTMxIn0.eyJhdWQiOiI2IiwianRpIjoiODA3ZjZhYzJhNjFhN2EzNzhiNjZkZDMxZTczMTJlYjczZDljYWI0YjZmYmQ3MTMwOTBlMzBjMWZiNWZiMGE4MzQyMzcxZDVlODU2YzFhMzEiLCJpYXQiOjE2MjY0Mzg1NjAsIm5iZiI6MTYyNjQzODU2MCwiZXhwIjoxNjU3OTc0NTYwLCJzdWIiOiIxNSIsInNjb3BlcyI6W119.UprH9hR_iJpF8LzkhtyeQQWDlPwW2_3-VIgXJkkRxB4wzYBYhZeLexr_GFK7xk9KiAwD7aTIjmyCAUsLN1DSHOvFZC6ye03OL8kAb1ufGQxtZlXOdBO9UJKG4ipmxvgsuMAJ-dzEEZpUGZh-MpK9BdNPd4tjZbRBml7eFJoehXLByfDCBsGTKnbpGb0IBsI9vrjAI7Mwsu2w5M0H3mYsW9Qj99k35XPXHoN8CaprJi6l29Hsrnh-OuuxXDjow4ElD6vMHN5bOSuA765Uc-JGViJMTFEWrOF42HHX7QivIyOHnJTyPShXpPT42TqysSBtsKmLMvr8x0MeBo2Yc_sZ7NN5c91xstgrfGFnm396XnsCiloXWTCCOQbkr5jp8APJIHxLq-x-_wPgFqo_lIwuAxJDSo-PAjE_fTZ7JB39X-xBkKeeGP9NbEMINDL3ZW_1NyFyOCIlhmsasmTSqnCdRpFt-9d7dvByPwrzHJJdldbis8ISbvjHdIOoRxh1igqMpiLyjOBBXvfk03B1hvOoNOvTvzCrxuh-P33Xnzvk3OxkTnITQznnTA03nH6O_qiZBqFnPmf0Qol-4DJEK0cx5igi9omYdrd4-O7gTc4YWYTgOhMFTVpdyKmycIb3qYxXmc1kHek_I84vhS8jUHW8fS0u9dKKfdKGLJVjiL8LbaQ',
                'Content-Type': 'application/json'
                }
            });
            const myJson = await response.json(); //extract JSON from the http response
            // console.log(myJson.brand.brand_name);
            alert(JSON.stringify(myJson.brand.brand_name));
        }
    </script>
  <?php  get_footer(); ?>

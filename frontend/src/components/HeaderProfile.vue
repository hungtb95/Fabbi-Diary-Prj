<template>
    <div class="card mt-5 mb-5">
        <div class="box box-widget widget-user">
        <div class="widget-user-header bg-black" style="background: url('../dist/img/photo1.png') center center;">
            <h3 class="widget-user-username" v-text="name"></h3>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="#" alt="User Avatar">
        </div>
        <div class="box-footer">
            <div class="row">
            <div class="col-sm-4 border-right">
                <div class="description-block">
                <h5 class="description-header" v-text="countDiaries"></h5>
                <span class="description-text">DIARIES</span>
                </div>
            </div>
            <div class="col-sm-4 border-right">
                <div class="description-block">
                <h5 class="description-header" v-text="countView"></h5>
                <span class="description-text">VIEWS</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="description-block">
                <h5 class="description-header">35</h5>
                <span class="description-text">REACTIVE</span>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "profile",
    props: {
        name: String,
        countDiaries: String,
        countView: String,
        avatar: String
    }
}
</script>
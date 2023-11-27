<template>
    <div class="row">
        <div class="col-sm-3">
            <filters endpoint="/api/courses/filters"></filters>
        </div>
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <template v-if="courses.length">
                        <course v-for="course in courses" :key="course.id" :course="course"></course>
                    </template>
                    <template v-else>
                        No results found
                    </template>
                    
                    <pagination
                        v-if="meta"
                        :meta="meta"
                    ></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import queryString from 'query-string'
    import Course from './partials/Course'
    import Pagination from '../pagination/Pagination'
    import Filters from '../filters/Filters'

    export default {
        components: {
            Course,
            Pagination,
            Filters
        },
        data () {
            return {
                courses: [],
                meta: null
            }
        },
        mounted () {
            this.getCourses()
        },
        watch: {
            '$route.query': {
                handler (query) {
                    this.getCourses(1, query)
                },
                deep: true
            }
        },
        methods: {
            getCourses(page = this.$route.query.page, filters = this.$route.query) {
                axios.get('/api/courses', {
                    params: {
                        page,
                        ...filters
                    }
                }).then((response) => {
                    this.courses = response.data.data
                    this.meta = response.data.meta
                })
            }
        }
    }
</script>

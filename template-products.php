<?php
/**
 * Template Name: Products Page
 *
 * @package WordPress
 * @subpackage Enfold_Products
 */

get_header(); ?>

    <section class="pr-ban">
        <?php if (has_post_thumbnail()) : ?>
            <img class="pr-ban__img" src='<?php echo get_the_post_thumbnail_url() ?>' alt="">
        <?php endif; ?>
        <div class="pr-ban__search"><?php get_search_form() ?></div>
    </section>
    <section class="pr-title">
        <div class="container">
            <div class="pr-breadcrumb">
                Products
            </div>

        </div>
    </section>
    <section class="pr-title pr-title--secondary">
        <div class="container">
            <p>Atticus, LLC manufactures a growing portfolio of relevant branded-generic fungicides, herbicides
                and insecticides for the US row crop, specialty agriculture and professional market.</p>
        </div>
    </section>
    <section class="sr-content">
        <div class="container">
            <div class="grid">
                <div class="col col-30">
                    <aside class="sr-form-container">
                        <form action="" id="product_search" class="sr-form">
                            <h4 class="sr-title">Product Line</h4>
                            <div class="sr-form-group sr-form-checkbox">
                                <input type="checkbox" class="sr-field sr-field--checkbox" name="market"
                                       value="Agricultural"
                                       id="market_agricultural">
                                <label for="market_agricultural">Agricultural
                                    Products
                                </label>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 179.58667 159.48"
                                     height="159.48" width="179.587">
                                    <path d="M119.44.007S117.67 11.71 107.964 16.1c-11.52 5.213-41.932 7.58-56.7 22.35C36.49 53.22 36.78 70.02 36.78 70.02s-7.53-2.03-16.58-2.61c-9.47-.605-16.435-5.213-20.2-8.397 0 0 4.922 11.727 8.398 24.035 5.672 20.09 9.715 32.713 39.832 35.984 0 0 18.588 40.852 63.292 40.445 40.823-.37 68.06-31.76 68.06-68.533 0-52.866-49.762-67.557-49.762-67.557s-2.518-18.97-10.38-23.38"
                                          fill="#fff"/>
                                    <path d="M88.04 113.92c-1.74.943-4.418 2.318-5.07 2.753-1.665 1.232-1.882 2.606-1.882 5.864 0 2.318 0 4.417 2.896 4.417 3.765 0 4.055-2.46 4.055-4.995zm11.512 13.323c0 3.55.362 4.42 1.664 6.01H88.04v-3.257c-2.463 2.17-4.997 4.344-9.63 4.344-9.197 0-9.197-7.46-9.197-9.993 0-9.122 3.62-10.643 9.123-12.815 5.865-2.172 6.517-2.463 9.703-3.982 0-3.403 0-3.476-.22-4.127-.723-1.883-2.46-1.883-3.185-1.883-3.257 0-3.257 2.172-3.257 6.01h-11.08c-.144-5.36-.29-13.83 14.048-13.83 3.186 0 7.313.435 10.282 1.955 4.924 2.607 4.924 7.313 4.924 9.847zm73.475-38.84c-.192-28.324-20.234-52.007-47.277-58.82 1.374 36.65-31.583 51.48-44.088 57.467-14.855 7.112-17.417 17.206-17.417 17.206-14.71-22.1.22-43.482 12.72-51.4-31.533 16.332-24.397 53.236-22.217 63.61 10.218 19.933 30.862 33.743 55.395 33.576.454-.002.904-.03 1.357-.043-1.782-.5-3.21-1.215-4.32-2.192-3.333-2.968-3.188-7.17-3.042-10.5h11.513c0 3.477 0 4.49.94 5.432.436.505 1.233.868 2.392.868 3.693 0 3.693-3.04 3.693-4.418v-9.194c-1.086 1.81-2.68 4.273-8.473 4.273-9.63 0-10.064-7.605-10.064-11.225v-17.088c0-4.344.507-7.313 2.1-9.196.65-.796 2.895-3.113 7.746-3.113 5.867 0 7.676 3.04 8.69 4.705v-3.62h11.657v41.78c0 3.148-.055 6.682-1.907 9.454 23.888-8.888 40.777-31.356 40.604-57.564zm-50.352 17.48c0-1.158 0-4.127-3.404-4.127-3.62 0-3.62 3.258-3.62 4.417V122.9c0 .723 0 3.692 3.403 3.692 3.622 0 3.622-3.547 3.622-4.49zm52.033-14.98c.232 35.2-27.91 63.924-62.866 64.16-28.368.19-52.503-18.444-60.72-44.29-33.017-66.06 17.053-81.65 41.946-86.462 25.823-4.997 26.553-12.42 27.935-17.718 2.98 8.35 4.443 15.873 4.735 22.655 27.89 6.503 48.77 31.568 48.97 61.655zm-124.45 24.22s-29.406.654-35.777-23.963C6.893 67.243 6.66 67.41 6.66 67.41S11.257 71 20.85 71.175c9.588.177 16.797 2.896 16.797 2.896s0 10.717 3.36 20.025c-2.882-1.17-9.88-8.56-10.853-10.706-.972-2.152 5.824 10.983 13.05 16.45 1.458 3.343 4.137 9.557 7.05 15.283"
                                          fill="#919190"/>
                                </svg>
                            </div>
                            <div class="sr-form-group sr-form-checkbox">
                                <input type="checkbox" class="sr-field sr-field--checkbox" name="market"
                                       value="Professional"
                                       id="market_professional">
                                <label for="market_professional">Professional
                                    Products
                                </label>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178.77333 170.02667"
                                     height="170.027" width="178.773">
                                    <path d="M157.867 94.79c-3.83 0-3.83 4.08-3.83 5.84v20.767c0 1.762 0 4.823 3.83 4.823s3.83-3.894 3.83-5.563v-20.304c0-2.04 0-5.562-3.83-5.562"
                                          fill="#fff"/>
                                    <path d="M174.77 119.73c0 5.377 0 16.966-16.82 16.966-4.747 0-9.078-1.02-12.325-3.708-4.414-3.523-4.665-8.252-4.665-13.908v-16.966c0-6.21 0-17.43 16.823-17.43 16.988 0 16.988 11.31 16.988 16.318zm-35.833-22.067c-5.745 0-5.995 0-7.16.28-4.832 1.11-5 5.748-5 8.992v28.278h-13.322V85.98h13.323v7.234c2.5-5.562 4.665-7.696 12.16-8.346zm-29.193 22.344c0 9.642-2.166 16.502-10.993 16.502-6.66 0-9.075-3.522-10.657-5.84v21.88h-13.24V85.98h13.24v5.287C89.84 88.392 92.173 84.59 99 84.59c1.333 0 5.498.093 8.33 3.896.58.833 2.414 3.245 2.414 9.177zM71.06 81.197v49.672l-14.61 25.02L49.33 49.6 42.57 155.89 4.586 85.76 49.693 7.964l42.55 73.232zm104.995 7.673c-3.34-5.433-9.49-8.187-18.272-8.187-7.088 0-11.763 1.805-14.846 4.416v-4.594l-4.345.377c-3.276.285-5.796.887-7.814 1.826v-.73h-21.323v2.833c-2.04-2.146-5.336-4.222-10.454-4.222-.847 0-1.646.05-2.4.14L49.69-.005 0 85.695l45.68 84.332 3.752-59.032 3.9 58.17 17.52-30.008v17.393h21.24v-17.247c1.794.732 3.98 1.206 6.66 1.206 5.115 0 8.484-1.795 10.703-4.364v3.067h21.323v-32.278c0-4.345.716-4.825 1.897-5.095.602-.144.714-.172 4.285-.175v17.415c0 5.104 0 12.09 6.143 17.012 3.705 3.054 8.7 4.604 14.846 4.604 20.82 0 20.82-15.78 20.82-20.966v-18.728c0-2.696 0-7.715-2.715-12.132"
                                          fill="#fff"/>
                                    <path d="M92.497 95.12c-.766 0-1.503.295-2.19.822-1.052.478-1.604 1.328-1.893 2.24-1.734 2.9-2.866 7.585-2.866 12.887 0 8.807 3.11 15.95 6.95 15.95 3.835 0 6.945-7.143 6.945-15.95 0-8.81-3.11-15.95-6.946-15.95"
                                          fill="#fff"/>
                                    <path d="M42.57 155.89L49.328 49.6 56.45 155.89l14.61-25.02V81.195h21.184L49.694 7.964 4.585 85.762zm119.127-55.537c0-2.04 0-5.562-3.83-5.562s-3.83 4.08-3.83 5.84v20.767c0 1.762 0 4.823 3.83 4.823s3.83-3.894 3.83-5.563zm-20.737 1.76c0-6.21 0-17.43 16.823-17.43 16.988 0 16.988 11.312 16.988 16.32v18.727c0 5.377 0 16.966-16.82 16.966-4.747 0-9.078-1.02-12.325-3.708-4.414-3.523-4.665-8.252-4.665-13.908zm-14.182-8.9c2.5-5.56 4.665-7.695 12.16-8.345v12.795c-5.746 0-5.996 0-7.16.28-4.833 1.11-5 5.748-5 8.992v28.278h-13.323V85.98h13.323zm-38.685 26.702c0 1.948 0 6.12 4.246 6.12 4.248 0 4.248-4.45 4.248-6.12v-18.728c0-1.668 0-5.655-4.166-5.655-4.33 0-4.33 3.708-4.33 5.47zm21.65.092c0 9.642-2.165 16.502-10.992 16.502-6.66 0-9.075-3.522-10.657-5.84v21.88h-13.24V85.98h13.24v5.287C89.84 88.392 92.173 84.59 99 84.59c1.333 0 5.498.093 8.33 3.896.58.833 2.414 3.245 2.414 9.177v22.344"
                                          fill="#919190"/>
                                </svg>
                            </div>
                            <h4 class="sr-title">Pesticide Classification</h4>
                            <div class="sr-form-group sr-form-checkbox sr-form-checkbox--sec sr-form-checkbox--fungicide">
                                <input type="checkbox" class="sr-field sr-field--checkbox"
                                       name="pesticide_classification"
                                       value="Fungicide"
                                       id="pesticide_fungicide">
                                <label for="pesticide_fungicide">Fungicide</label>
                            </div>
                            <div class="sr-form-group sr-form-checkbox sr-form-checkbox--sec sr-form-checkbox--herbicide">
                                <input type="checkbox" class="sr-field sr-field--checkbox"
                                       name="pesticide_classification"
                                       value="Herbicide"
                                       id="pesticide_herbicide">
                                <label for="pesticide_herbicide">Herbicide</label>
                            </div>
                            <div class="sr-form-group sr-form-checkbox sr-form-checkbox--sec sr-form-checkbox--insecticide">
                                <input type="checkbox" class="sr-field sr-field--checkbox"
                                       name="pesticide_classification"
                                       value="Insecticide"
                                       id="pesticide_insecticide">
                                <label for="pesticide_insecticide">Insecticide</label>
                            </div>
                            <h4 class="sr-title">Registration Status</h4>

                            <div class="sr-form-item">
                                <label>
                                    <div id="sr_select">
                                        <select class="sr-field sr-field--select" name="state"
                                                style="display: none"
                                                multiple="multiple" placeholder="Search by state...">
                                            <?php $states = get_US_list(); ?>
                                            <?php foreach ($states as $state) : ?>
                                                <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </label>
                            </div>

                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'post_tag',
                                'hide_empty' => false,
                            ));
                            ?>

                            <h4 class="sr-title">Key Uses</h4>

                            <label>
                                <div id="sr_select_key">
                                    <select class="sr-field sr-field--select" name="key_uses"
                                            style="display: none"
                                            multiple="multiple" placeholder="Search by use...">

                                        <?php if (!empty($terms)): ?>
                                            <?php foreach ($terms as $term): ?>
                                                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </label>
                        </form>
                        <div class="sr-loading"></div>
                    </aside>
                </div>
                <div class="col col-70">
                    <div class="sr-results" id="search_results">

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer();
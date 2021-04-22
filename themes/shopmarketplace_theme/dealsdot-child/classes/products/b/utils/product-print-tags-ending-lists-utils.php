<?php 

    namespace Products;

    class ProductPrintTagsEndingListsUtils {

        public static function print($count, $max) {

            if ( $count % 2 !== 0 || $count === $max - 1 ) : ?>

				</div>

			</div>

		<?php endif; 

        }

    }
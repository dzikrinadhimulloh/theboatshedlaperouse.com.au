### Development

1. Run `npm install`
2. Create `.env` file and update the base url as needed. See `.env.example` file.
3. Run `npm run dev` to start development. The browsersync will proxying BASE_URL to localhost:3000

### Build Assets

The `npm run dev` command only builds the assets for the browsersync server. To build the assets for production, run `npm run build`.

It is not necessary to run this command before committing. Just remember to run it whenever you want to check the site on the staging or production server.

### [Tailwind Content Configuration](https://tailwindcss.com/docs/content-configuration)

Tailwind CSS works by scanning all of your HTML, JavaScript components, and any other template files for class names, then generating all of the corresponding CSS for those styles.

Add those files names to the `content` property in the `tailwind.config.js`. 

DO NOT ADD `./*.php` to the `content` property, it will rebuild the assets endlessly. See here for the reason https://tailwindcss.com/docs/content-configuration


Add the secret key in the repo's settings > secret and variables > actions

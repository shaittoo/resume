# Professional Portfolio Website

A modern, responsive portfolio website built with CodeIgniter 4 and Bulma CSS that allows you to create and manage your professional portfolio online.

## Features

- **Modern Design**: Clean, professional design with Bulma CSS framework
- **Complete Portfolio Sections**: Personal info, experience, education, skills, and projects
- **Admin Panel**: Easy-to-use management interface
- **Dynamic Content**: Update your portfolio content without touching code
- **Print-Friendly**: Optimized for printing and PDF generation
- **SEO Optimized**: Clean URLs and meta tags
- **Mobile Responsive**: Works perfectly on all devices
- **Bulma CSS**: Modern, lightweight CSS framework

## Quick Start

### 1. Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (for dependency management)

### 2. Installation

1. **Clone or download** the project to your web server directory
2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Configure database**:
   - Copy `app/Config/Database.php.example` to `app/Config/Database.php`
   - Update database credentials in the config file

4. **Run migrations**:
   ```bash
   php spark migrate
   ```

5. **Set up your portfolio**:
   - Visit `http://your-domain.com/setup`
   - Fill in your personal information
   - Create your admin account

### 3. First Time Setup

1. **Visit the setup page**: `http://your-domain.com/setup`
2. **Fill in your information**:
   - Personal details (name, email, title, etc.)
   - Professional summary
   - Social media links
   - Admin password

3. **Access admin panel**: `http://your-domain.com/admin`
4. **Add your content**:
   - Work experience
   - Education
   - Skills
   - Projects

## Integrating Your Existing Portfolio Data

### Option 1: Manual Entry (Recommended for small datasets)
1. **Log into admin panel** at `/admin`
2. **Add your existing data** through the web interface:
   - Copy-paste your experience entries
   - Add your education history
   - Input your skills with proficiency levels
   - Upload project details and images

### Option 2: Database Import (For larger datasets)
1. **Export your existing data** to CSV format
2. **Create a data import script** or use the admin interface
3. **Batch import** your portfolio content

### Option 3: Direct Database Insertion
1. **Connect to your database** directly
2. **Insert your data** into the appropriate tables:
   - `users` - Your personal information
   - `experience` - Work experience
   - `education` - Educational background
   - `skills` - Technical and soft skills
   - `projects` - Portfolio projects

## Usage

### Public Portfolio

Your portfolio is automatically available at the root URL (`http://your-domain.com/`). The page displays:

- **Header**: Your name, title, contact info, and social links
- **Summary**: Professional overview
- **Experience**: Work history with company details
- **Education**: Academic background
- **Skills**: Technical and soft skills with proficiency bars
- **Projects**: Portfolio with descriptions and links

### Admin Panel

Access the admin panel at `http://your-domain.com/admin` to manage your portfolio:

#### Dashboard
- Overview of your portfolio statistics
- Quick access to all management sections

#### Profile Management
- Update personal information
- Change contact details
- Edit professional summary
- Update social media links

#### Experience Management
- Add new work experience
- Edit existing entries
- Set current positions
- Add achievements and descriptions

#### Education Management
- Add educational background
- Include GPA and descriptions
- Mark current studies

#### Skills Management
- Add technical and soft skills
- Set proficiency levels (0-100%)
- Organize by categories
- Visual skill bars

#### Projects Management
- Showcase portfolio projects
- Add project images
- Include live demo and GitHub links
- Mark featured projects

## File Structure

```
app/
├── Config/
│   ├── Database.php          # Database configuration
│   └── Routes.php            # URL routing
├── Controllers/
│   ├── Resume.php            # Main portfolio controller
│   └── Admin.php             # Admin panel controller
├── Models/
│   ├── UserModel.php         # User/profile management
│   ├── ExperienceModel.php   # Work experience
│   ├── EducationModel.php    # Education background
│   ├── SkillsModel.php       # Skills management
│   └── ProjectsModel.php     # Portfolio projects
├── Views/
│   ├── resume/
│   │   ├── index.php         # Main portfolio view
│   │   └── setup.php         # Initial setup form
│   └── admin/
│       ├── dashboard.php     # Admin dashboard
│       └── login.php         # Admin login
└── Database/Migrations/      # Database table creation
```

## Customization

### Styling with Bulma

The portfolio uses Bulma CSS framework for styling. You can customize the appearance by:

1. **Modifying CSS variables** in the `:root` selector:
```css
:root {
    --primary-color: #2563eb;    /* Main brand color */
    --secondary-color: #64748b;  /* Secondary text */
    --accent-color: #f59e0b;     /* Accent/highlight color */
    --text-dark: #1e293b;        /* Dark text */
    --text-light: #64748b;       /* Light text */
    --bg-light: #f8fafc;         /* Light background */
    --border-color: #e2e8f0;     /* Border color */
}
```

2. **Using Bulma classes** for consistent styling:
   - `button is-primary` for primary buttons
   - `notification is-success` for success messages
   - `columns` and `column` for responsive layouts
   - `input` and `textarea` for form elements

### Adding New Sections

To add new portfolio sections:

1. **Create migration** for the new table
2. **Create model** for data management
3. **Add controller methods** for CRUD operations
4. **Create admin views** for management
5. **Update portfolio view** to display the section
6. **Add routes** for new functionality

### Database Schema

The system uses these main tables:

- **users**: Personal information and profile
- **experience**: Work experience entries
- **education**: Educational background
- **skills**: Technical and soft skills
- **projects**: Portfolio projects

## Security Features

- **Password hashing**: Secure password storage
- **Session management**: Secure admin sessions
- **Input validation**: Form validation and sanitization
- **CSRF protection**: Built-in CodeIgniter security
- **SQL injection prevention**: Query builder protection

## Deployment

### Production Setup

1. **Environment configuration**:
   ```bash
   cp env .env
   # Edit .env with production settings
   ```

2. **Set proper permissions**:
   ```bash
   chmod -R 755 writable/
   ```

3. **Configure web server**:
   - Point document root to `public/`
   - Enable URL rewriting
   - Set up SSL certificate

4. **Database optimization**:
   - Create database indexes
   - Set up regular backups
   - Configure connection pooling

### Performance Tips

- Enable PHP OPcache
- Use CDN for external resources (Bulma, FontAwesome)
- Implement caching for database queries
- Optimize images for web
- Enable gzip compression

## Troubleshooting

### Common Issues

1. **Database connection errors**:
   - Check database credentials in `app/Config/Database.php`
   - Ensure MySQL service is running
   - Verify database exists

2. **Migration errors**:
   - Check PHP version compatibility
   - Ensure database user has CREATE privileges
   - Clear any existing tables if needed

3. **Admin login issues**:
   - Verify email and password
   - Check if user exists in database
   - Clear browser cache and cookies

4. **Styling issues**:
   - Check if Bulma CSS is loading properly
   - Verify internet connection for CDN resources
   - Clear browser cache

### Support

For issues and questions:
1. Check the CodeIgniter 4 documentation
2. Review the error logs in `writable/logs/`
3. Verify all dependencies are installed
4. Test with a fresh installation

## License

This project is open source and available under the MIT License.

## Contributing

Contributions are welcome! Please feel free to submit pull requests or open issues for bugs and feature requests.

---

**Happy portfolio building!** 🚀 